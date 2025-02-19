<template>
    <div class="login_container">
        <form @submit.prevent="login_request">
            <!-- 임시 이미지 영역 -->
            <div class="login_image_section"></div>
            <!-- 임시 이미지 영역 -->
            <div class="login_input_section">
                <input
                    class="login_input"
                    type="text"
                    name="user_id"
                    v-model="user_id"
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
                    v-model="password"
                    placeholder=""
                />
                <label class="login_label">비밀번호</label>
            </div>
            <div class="login_button_section flex justify-center">
                <button type="submit" class="login_button">Login</button>
            </div>              
        </form>
    </div>
</template>

<script>
import "@/styles/auth/login.scss";
export default {
    data() {
        return {
            user_id: '',
            password: ''
        };
    },
    methods: {
        login_request() {
            console.log('로그인 요청:', { user_id: this.user_id, password: this.password });
        }
    }
};
</script>
