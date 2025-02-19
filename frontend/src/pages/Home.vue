<template>
    <div>
        <h2>Home Page</h2>
        <p>API Response: {{ message }}</p>
        <button @click="logout">로그아웃</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            message: '',
        };
    },
    mounted() {
        this.$api.get('/message')
            .then(response => {
                this.message = response.data.message;
            })
            .catch(error => {
                console.error('API 요청 실패:', error);
            });
    },
    methods: {
        logout() {
            this.$router.push('/'); // 로그아웃 시 로그인 페이지로 이동
        }
    }
};
</script>

<style scoped>
button {
    padding: 10px 20px;
    background-color: red;
    color: white;
    border: none;
    cursor: pointer;
}
</style>
