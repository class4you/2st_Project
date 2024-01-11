<template>
    <!-- Page Wrapper -->
    <loading-component v-if="loading" />
    <div class="bg-gradient-primary">
        <!-- <h2>Weekly Coding Challenge #1: Sign in/up Form</h2> -->
            <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="#">
                <h1 style="font-size: 30px;">Create Account</h1>
                <div class="social-container">
                    <!-- <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a> -->
                </div>
                <!-- <span>or use your email for registration</span> -->
                <input type="text" placeholder="Name" />
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <button style="margin-top: 30px; cursor: pointer;">Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="#">
                <h1 style="font-size: 30px;">Sign in</h1>
                <div class="social-container">
                    <!-- <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a> -->
                </div>
                <!-- <span>계정 정보를 입력하세요.</span> -->
                <input v-model="frmInstructorLoginData.InstructorEmail" type="email" placeholder="Email" />
                <input v-model="frmInstructorLoginData.InstructorPassword" type="password" placeholder="Password" />
                <!-- <a href="#">비밀번호를 잊으셨나요?</a> -->
                <button style="margin-top: 30px; cursor: pointer;" type="button" @click="submitInstructorLoginData()">Sign In</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>이미 계정이 존재하시나요?</h1>
                    <p style="font-weight: 600;">승인 받은 아이디로 로그인 해주세요.</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>관리자 계정이 없으신가요?</h1>
                    <p style="font-weight: 600;">최초 관리자 승인 후 로그인 가능합니다.</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
                </div>
            </div>
            </div>
    </div>
</template>
<script>
import LoadingComponent from './LoadingComponent.vue';

export default {
    name: 'AdminLoginComponent',

    data() {
        return {
            loading: true, // 로딩 상태를 나타내는 데이터
            
            frmInstructorLoginData: {
                InstructorEmail: '',
                InstructorPassword: '',
            },
        };
    },

    methods: {
        submitInstructorLoginData() {
            this.$store.dispatch('submitInstructorLoginData', this.frmInstructorLoginData);       
        }
    },

    mounted() {
        // 스크립트를 로드하는 함수를 정의
        const loadScript = (src, callback) => {
        const script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = src;
        script.onload = callback;
        document.head.appendChild(script);
        };

        // 로드할 외부 스크립트들의 배열로 정의
        const externalScriptsToLoad = [
        'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js',
        'https://kit.fontawesome.com/3eee069757.js'
        ];

        // 로드할 내부 스크립트의 경로를 정의
        const internalScriptToLoad = '/js/adminscript.js';

        // 외부 스크립트를 로드하는 함수
        const loadExternalScripts = (scripts, callback) => {
        let loadedScripts = 0;
        const loadNextScript = () => {
            if (loadedScripts < scripts.length) {
            loadScript(scripts[loadedScripts], () => {
                loadedScripts++;
                loadNextScript();
            });
            } else {
            callback();
            }
        };

        loadNextScript();
        };

        // 내부 스크립트를 로드하는 함수
        const loadInternalScript = (src, callback) => {
            const script = document.createElement('script');
            script.type = 'module';  // 여기에 type="module" 추가
            script.src = src;
            script.onload = callback;
            document.head.appendChild(script);
        };

        // 외부 스크립트들을 로드한 후 내부 스크립트를 로드
        loadExternalScripts(externalScriptsToLoad, () => {
            loadInternalScript(internalScriptToLoad, () => {
                // 모든 스크립트가 로드된 후 실행될 코드를 이곳에 추가
                console.log('All scripts loaded!');
            });
        });

    },

    beforeCreate() {
        // 스타일시트를 동적으로 로드한 후 로딩 상태 변경
        const styleLink = document.createElement('link');
        styleLink.rel = 'stylesheet';
        styleLink.href = '/css/adminlogin.css';
        document.head.appendChild(styleLink);
        // 스타일시트 로드 완료 후 로딩 상태 변경
        const checkLoad = () => {
        if (styleLink.sheet) {
            // 스타일시트가 로드되었음을 확인하면 로딩 상태 변경
            this.loading = false;
        } else {
            // 스타일시트가 아직 로드되지 않았으면 재귀적으로 체크
            setTimeout(checkLoad, 10);
        }
        };

        checkLoad();
    },

    components: {
        LoadingComponent,
    },
}
</script>
<style scoped>

</style>