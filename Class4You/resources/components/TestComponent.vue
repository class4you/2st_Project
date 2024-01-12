<!-- <template>
  <div>
    <div v-if="!completed">
      <h2>{{ questions[currentQuestion].question }}</h2>
      <div v-for="(option, index) in questions[currentQuestion].options" :key="index">
        <input type="radio" :id="'option' + index" :value="index" v-model="selectedOptions[currentQuestion]">
        <label :for="'option' + index">{{ option }}</label>
      </div>
        <button @click="nextQuestion">다음</button>
    </div>
    <div v-else>
      <p>당신의 추천 프로그래밍 언어는 {{ getRecommendedLanguage() }}입니다.</p>
    </div>
  </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
      currentQuestion: 0,
      selectedOptions: [],
      completed: false,
      results: [],
      questions: [
        {
          question: '친구가 쿠키를 만들었다며 나누어준다. 고마움과 동시에 당신은 어떤생각을 하게 되는가?',
          options: ['a. 어떤 비율과 레시피로 만들었길래 이렇게 맛있지?', 'b. 쿠키 모양이 너무 예뻐서 아까워서 못먹겠다', 'c. 베이킹 사업을 같이 하자고 제안해봐야겠어']
        },
        {
          question: '당신은 팀 활동과 개인 활동 중 무엇을 선택할 것인가?',
          options: ['a. 프로젝트는 사람들과 협업하는 묘미지!', 'b. 나는 혼자 하는 게 편해...', 'c. 흠 난 둘 다 상관 없어']
        },
        {
          question: '팀 활동을 할 때 주어진 역할 중 한 가지를 선택한다면?',
          options: ['a. PPT 만들기 (이쁘게 보여야 발표할 때 더 높은 점수를 받을거야!)', 'b. 자료조사 (발표에서 중요한건 근거지!)', 'c. 발표 (다 필요 없고 해당 근거를 상대에게 전달하는게 중요하지!)']
        },
        {
          question: '당신의 ppt 만들기 스타일은?',
          options: ['a. 음... 그냥 PPT켜서 하얀 슬라이드에 글만 적자...', 'b. PPT는 이쁜게 짱이지!! 탬플릿부터 찾아보자!!', 'c. 탬플릿이 뭐야! 디자인은 내가 더 잘해! 내가 다 만들어야지!!']
        },
        {
          question: '카페에서 공부를 할려고 한다! 어떤 카페를 갈까??',
          options: ['a. 소음이라고는 없는 스터디 카페!!', 'b. 조용한건 못참아... 그래도 어느정도 화이트노이즈는 필요해!', 'c. 난 시끄럽고 사람 많은 곳이 더 집중 잘 돼!']
        },
        {
          question: '최신 맥북이 나왔다! 나의 반응은...!?',
          options: ['a. 와... 디자인.. 미친.. 이건 꼭 사야해!', 'b. 뭐..? M2칩을 탑재했다고? 성능 미쳤다...', 'c. 맥북..? 한국인은 윈도우지!']
        },
        {
          question: '신년을 맞아 새로운 다이어리를 살 예정인 당신, 어떤 다이어리를 살 것인가?',
          options: ['a. 일정을 효율적으로 관리 가능한 깔끔한 다이어리!', 'b. 취향 저격 개성있는 예술적인 디자인의 다이어리!', 'c. 디자인 상관없고 그냥 아무 다이어리면 되지']
        },
        {
          question: '내용이 어려운 공부를 할 때 당신의 스타일은?',
          options: ['a. 이해가 될 때까지 넘어가지 않고 공부한다.', 'b. 어차피 이해 못할 것 같으니, 그냥 외워버리고 진도를 나간다.', 'c. 공부..? 그게 뭔대']
        },
        {
          question: '두근두근 드디어 자취를 시작했다. 당신은 어떻게 집을 꾸밀 것인가?',
          options: ['a. 방 사이즈를 재고 크기에 맞는 가구를 찾아본다.', 'b. 이쁜 가구가 최고지 사이즈는 억지로 맞추면 돼!', 'c. 하.. 귀찮아... 그냥 있는대로 살자']
        }
      ]
      };
    },
    methods: {
      nextQuestion() {
      if (this.selectedOptions[this.currentQuestion] !== undefined) {
        // 현재 질문에 대한 선택한 옵션을 결과 배열에 추가
        this.results.push(this.selectedOptions[this.currentQuestion]);
  
        console.log(this.selectedOptions);
        // 다음 질문으로 이동
        if (this.currentQuestion < this.questions.length - 1) {
          this.currentQuestion++;
        } else {
          // 모든 질문이 완료되면 결과를 분석하여 추천 프로그래밍 언어를 설정
          this.completed = true;
          // 선택된 항목을 인자로 전달하여 함수 호출
          this.getRecommendedLanguage();
        }
        // 계산 후 해당 데이터 초기화
        this.selectedOptions[this.currentQuestion] = null;
        }
      },
      getRecommendedLanguage() {
      // 각 유형에 따라 추천되는 프로그래밍 언어를 결정하는 로직을 작성
      const resultCounts = { a: 0, b: 0, c: 0 };
  
      // 결과를 분석하여 각 유형의 개수를 계산
      this.selectedOptions.forEach(optionIndex => {
      const option = ['a', 'b', 'c'][optionIndex];
      resultCounts[option]++;
      });
  
      // 가장 많이 선택된 유형 계산
      const maxType = Object.keys(resultCounts).reduce((a, b) => resultCounts[a] > resultCounts[b] ? a : b);
      // 각 유형에 따라 추천되는 프로그래밍 언어를 반환
      switch (maxType) {
        case 'a':
          return '백앤드 개발자';
        case 'b':
          return '프론트앤드 개발자';
        case 'c':
          return 'UI UX 디자이너';
        default:
          return '추천 프로그래밍 언어';
        }
      }
    }
  };
  </script> -->
<!-- 
  <template>
    <h2 class="fw-bold mb-2" style="color:#4A5157">회원가입</h2>
    <br />
    <div class="form-outline form-white mb-4">
        <input type="text" v-model="email" class="form-control form-control-lg" placeholder="email" />
        <button class="btn btn-primary btn-sm" style=" color :#4A5157 ;border: none; background-color: white;"
            v-on:click="sendEmail">이메일인증</button>
    </div>
    <div class="form-outline form-white mb-4">
        <input type="text" class="form-control form-control-lg" placeholder="인증번호를 입력!" @input="updateEmailCheck" />
        <button class="btn btn-primary btn-sm" style=" color :#4A5157 ;border: none; background-color: white;"
            v-on:click="emailcheck">확인</button>
    </div>
    <button class="btn btn-primary btn-lg" style="color :#4A5157; border: none; background-color: white;"
        v-on:click="join" v-show="isVisible">join</button>
</template>

<script>
    export default {
        name: 'join',
        data() {
            return {
                email: '',
                pwd: '',
                nickname: '',
                phone: '',
                echeck: '',
                isVisible: false
            }
        },
        methods: {
            sendEmail() {
              const URL = '/emailChkSubmit';
              const HEADER = {
                headers: {
                  'Content-Type': 'multipart/form-data',
                }
              };
              const formData = new FormData();
              formData.append('email', this.email);
              axios.post(URL,formData,HEADER)
              .then(res => {

              })
              .catch(err => {

              })
            },

            updateEmailCheck(event) {
                this.echeck = event.target.value;
            },

            emailcheck() {
                const self = this;
                if (self.echeck === self.emailKey) {
                    alert('확인 완료');
                    this.isVisible = true;
                } else {
                    alert('인증번호가 일치하지 않습니다.');
                }
            }
        }
    }
</script> -->

<template>
  <Radar id="my-chart-id" :options="chartOptions" :data="chartData"/>
</template>

<script>
import { Radar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, LineElement, PointElement, LinearScale, RadialLinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, LineElement, PointElement, LinearScale, RadialLinearScale)

export default {
  name: 'RadarChart',
  components: { Radar },
  data() {
    return {
      chartData: {
        labels: ['Eating', 'Drinking', 'Sleeping', 'Designing', 'Coding', 'Cycling', 'Running'],
        datasets: [
          {
            label: 'My First dataset',
            backgroundColor: 'rgba(179,181,198,0.2)',
            borderColor: 'rgba(179,181,198,1)',
            pointBackgroundColor: 'rgba(179,181,198,1)',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgba(179,181,198,1)',
            data: [65, 59, 90, 81, 56, 55, 40]
          },
          // Add more datasets if needed
        ]
      },
      chartOptions: {
        responsive: true
        // Add more Radar chart options if needed
      }
    }
  }
}
</script>