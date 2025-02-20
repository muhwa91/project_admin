<template>
    <div class="login_container flex flex-col justify-between h-full">
        <form @submit.prevent="login_request" class="flex flex-col flex-grow">
            <div class="login_input_section">
                <input
                    class="login_input"
                    type="text"
                    name="id"
                    v-model="login_form_data.id"
                    placeholder=""
                    autocomplete="off"
                />
                <label class="login_label">아이디</label>
            </div>
            <div class="login_input_section">
                <input
                    class="login_input"
                    type="password"
                    name="password"
                    v-model="login_form_data.password"
                    placeholder=""
                />
                <label class="login_label">비밀번호</label>
            </div>
            <div v-if="error_msg" class="login_error_section text-red-500 text-center">
                <span>{{ error_msg }}</span>
            </div>
            <div class="login_button_section flex justify-center mt-auto">
                <button type="submit" class="btn text-red-500">Login</button>
            </div>              
        </form>
    </div>
</template>

<script>
import "@/styles/auth/login.scss";
import { reactive, ref, getCurrentInstance, } from "vue";

export default {
    setup() {
        const { proxy } = getCurrentInstance();
        const api = proxy.$api;
        const store = proxy.$store;

        const login_form_data = reactive({
            id: "",
            password: ""
        });

        const error_msg = ref("");

        const login_request = async () => {

            if (!login_form_data.id && !login_form_data.password) {
                error_msg.value = "로그인 정보를 입력해주세요.";
                return;
            } else if (!login_form_data.id) {
                error_msg.value = "아이디를 입력해주세요.";
                return;
            } else if (!login_form_data.password) {
                error_msg.value = "비밀번호를 입력해주세요.";
                return;
            } 

            const form_data = new FormData();
            form_data.append("id", login_form_data.id);
            form_data.append("password", login_form_data.password);

            try {
                const response = await api.post("/login", form_data);

                if (response.data.success) {
                    // store.commit("setUser", response.data.user); 
                    error_msg.value = "";
                    alert("로그인 성공!");
                } else {
                    error_msg.value = response.data.message || "로그인 실패!";
                }
            } catch (error) {
                console.error(error);
                error_msg.value = "서버 오류가 발생했습니다.";
            }


            // store.dispatch("login", login_form_data);
        };

        return {
            login_form_data,
            error_msg,
            login_request,
        };
    }
};
</script>