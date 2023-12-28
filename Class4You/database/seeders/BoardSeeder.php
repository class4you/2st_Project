<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Board;
use Faker\Factory as Faker;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);
        

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => '딕셔너리와 튜플',
                'BoardComment' => '딕셔너리의 원래 형태는 리스트안에 튜플이 들어있는 구조라고 말씀하셨는데 그러면 딕셔너리의 Value를 수정하게 되면 튜플도 수정하게 되는것 으로 생각이 들어서요 이 부분이 이해가 잘 안됩니다 ㅠㅠ',
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => 'JPA @Transactional',
                'BoardComment' => 'JPA 기술을 사용할 때 리포지토리 계층에 @Transactional을 붙여줘야 한다고 말씀해주셨는데 MemberRepository 코드에서는 JPA를 사용하는데 왜 @Repository만 붙여주는 건가요??',
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => '[최대 길이 연속부분수열] 틀린 이유',
                'BoardComment' => <<<EOT
        import java.util.*;

        class Main {
        public int solution(int n, int m, int[] arr) {
            int lt = 0, sum = 0, max = 0, count = 0;
            for(int rt = 0; rt < n; rt++) {
                if(arr[rt] == 1) {
                    sum += arr[rt];
                } else if (arr[rt] == 0) {
                    if(count++ < m) {
                        sum += 1;
                    } else {
                        if (sum >= max) {
                            max = sum;
                            sum = 0;
                            lt ++;
                            rt = lt;
                            count = 0;
                        }
                    }
                }
            }
            return max;
        }

        public static void main(String[] args) {
            Main T = new Main();
            Scanner in = new Scanner(System.in);
            int n = in.nextInt();
            int m = in.nextInt();
            int[] arr = new int[n];
            for(int i = 0; i < n; i++) {
                arr[i] = in.nextInt();
            }
            System.out.print(T.solution(n, m, arr));
        }
        }
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => 0,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => '커리큘럼 질문드려요.',
                'BoardComment' => <<<EOT
        자바, 스프링부트 백엔드 과정을 수강했는데요.

        node.js까지 꼭 해야하나요?

        지금 생각하는건 부트랑 vue.js 연결해서 SPA 만들고 싶은데.

        그럼 저같은 백엔드 과정 준비했던 수강생은 별도로 node.js까진 수강하지 않아도 되는건가요?

        당근마켓 기반 데이터베이스 강의까지 로드맵 따라가면 될까요?

        자바스크립트 책이 읽어보고 좋아서 프론트쪽은 선생님한테 배워보려고 하는데

        커리큘럼좀 설명부탁드려요.
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => 'postman에서 오류가 납니다..',
                'BoardComment' => <<<EOT
        이전까지는 모든게 다 되는데 postman test에 전역 변수를 잡고 Authorization에 {{jwt_tutorial_token}}을 넣어서 send 해봐도

        Something went wrong while running your scripts. Check Postman Console for more info 라는 작은 팝업창만 뜰 뿐, 아무런 반응이 없습니다...

        모든 코드와 postman에도 모두 동일하게 작성을 했는데, 왜 이런 오류가 발생하는지 알 수 있을까요..?ㅜㅜ
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => '매서드에서 void가 쓰이는 경우',
                'BoardComment' => <<<EOT
        =========================================
        [질문 템플릿]
        1. 강의 내용과 관련된 질문인가요? (예/아니오)
        2. 인프런의 질문 게시판과 자주 하는 질문에 없는 내용인가요? (예/아니오)
        3. 질문 잘하기 메뉴얼을 읽어보셨나요? (예/아니오)

        [질문 내용]
        여기에 질문 내용을 남겨주세요.



        메서드에서 반환타입이 없어서 void를 쓰는경우(return을 쓸 필요 없는 경우)는 메서드가 출력문 system.out.println("내용");

        으로만 이루어진 경우 뿐 인가요?
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => '안녕하세요, react-query 관해서 궁금해서 질문드립니다.',
                'BoardComment' => <<<EOT
        react-query의 쓰임새가 잘 이해가 안가서 질문드립니다.

        1. 컴포넌트가 server component 일때는 react-query에 prefetchQuery를 사용하여 미리 서버에서 데이터를 가져오고 dehydrate를 통하여 클라이언트에 전송할수있는 형태로 만들어주고,
        HydrationBoundary 로 감싸여진 클라이언트 컴포넌트는 서버에서 미리 가져온 데이터를 클라이언트의 쿼리 캐시에 적용하여, getQueryData를 사용하여 네트워크 요청 없이 데이터를 가져올수있고,
        useQuery 같은 경우에는 미리 가져온 데이터 외에 클라이언트에서 데이터를 가져올 때 사용하는 걸로 이해했습니다. 맞을까요??

        2. queryKey 같은 경우에는 queryFn에 있는 함수에 queryKey를 넘기는 경우가 있고 안넘기는 경우가 있던데 강의에서 props에 따라 키가 바뀌는 경우에만 넘기게 된다고 이해했습니다.
        그러면 server component에서 모든걸 prefetchQuery 해서 getQueryData 로 가져다 쓰지 않는 이유가 useQuery를 이용해서 key 값을 다이나믹하게 바뀌는 요청들을 컨트롤 하기 위해서라고 생각이 들었습니다.
        하지만 아래와 같이 queryKey를 넘기지 않는 경우에도 useQuery를 사용하는데 prefetchQuery를 해놓고 getQueryData 를 사용할지, prefetchQuery 를 사용하지않고 useQuery를 사용할지 에 대해서 나누는 기준이 있을까요?

        ============================
        const { data } = useQuery<Hashtag[]>({
        queryKey: ["trends"],
        queryFn: getTrends,
        staleTime: 60 * 1000,
        gcTime: 300 * 1000,
        enabled: !!session?.user,
        });
        ============================
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => 'UICollectionView 클래스 addSubView 없음 질문',
                'BoardComment' => <<<EOT
        안녕하세요! 셀 구현하여 Collection View에 등록하기 초입 시작했는데,

        SetUI() 메서드에서 self.addSubVIew()로 라벨이랑 배경이미지 뷰 추가시켜 주는데, Value of type 'BannerCollectionViewCell' has no member 'addSubView' 라는 에러가 뜹니다.

        혹시 다른 클래스를 상속해야 하나요..?
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => '무상태 프로토콜 을 제대로 이해한건지 모르겠습니다',
                'BoardComment' => <<<EOT
        학습하는 분들께 도움이 되고, 더 좋은 답변을 드릴 수 있도록 질문전에 다음을 꼭 확인해주세요.

        1. 강의 내용과 관련된 질문을 남겨주세요.
        2. 인프런의 질문 게시판과 자주 하는 질문(링크)을 먼저 확인해주세요.
        (자주 하는 질문 링크: https://bit.ly/3fX6ygx)
        3. 질문 잘하기 메뉴얼(링크)을 먼저 읽어주세요.
        (질문 잘하기 메뉴얼 링크: https://bit.ly/2UfeqCG)

        질문 시에는 위 내용은 삭제하고 다음 내용을 남겨주세요.
        =========================================
        [질문 템플릿]
        1. 강의 내용과 관련된 질문인가요? (예)
        2. 인프런의 질문 게시판과 자주 하는 질문에 없는 내용인가요? (예)
        3. 질문 잘하기 메뉴얼을 읽어보셨나요? (예)

        [질문 내용]
        Stateless 의 대표적인 예 는 쿠키 이며 Stateful 의 대표적인 예는 세션 이라고 이해를 했습니다.

        그렇다고 한다면 여기서 궁금증이 생깁니다. HTTP 는 기본적으로 stateless 이며 HTTP 요청은 이전 요청과 상관없이 독립적으로 처리되는데 HTTP 는 통신 프로토콜 중 하나가 아닌가요?
        세션 또한 서버와 통신을 해야 데이터를 받아 오고 HTTP 통신을 통해 데이터를 받아올 텐데 세션의 정의가 뭔가 모호해진거 같습니다.
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => '롤링 업데이트 시 이전 Replicasets 문의',
                'BoardComment' => <<<EOT
        학습하는 분들께 도움이 되고, 더 좋은 답변을 드릴 수 있도록 질문전에 다음을 꼭 확인해주세요.

        1. 강의 내용과 관련된 질문을 남겨주세요.
        2. 인프런의 질문 게시판과 자주 하는 질문(링크)을 먼저 확인해주세요.
        (자주 하는 질문 링크: https://bit.ly/3fX6ygx)
        3. 질문 잘하기 메뉴얼(링크)을 먼저 읽어주세요.
        (질문 잘하기 메뉴얼 링크: https://bit.ly/2UfeqCG)

        질문 시에는 위 내용은 삭제하고 다음 내용을 남겨주세요.
        =========================================
        [질문 템플릿]
        1. 강의 내용과 관련된 질문인가요? (예)
        2. 인프런의 질문 게시판과 자주 하는 질문에 없는 내용인가요? (예)
        3. 질문 잘하기 메뉴얼을 읽어보셨나요? (예)

        [질문 내용]
        Stateless 의 대표적인 예 는 쿠키 이며 Stateful 의 대표적인 예는 세션 이라고 이해를 했습니다.

        그렇다고 한다면 여기서 궁금증이 생깁니다. HTTP 는 기본적으로 stateless 이며 HTTP 요청은 이전 요청과 상관없이 독립적으로 처리되는데 HTTP 는 통신 프로토콜 중 하나가 아닌가요?
        세션 또한 서버와 통신을 해야 데이터를 받아 오고 HTTP 통신을 통해 데이터를 받아올 텐데 세션의 정의가 뭔가 모호해진거 같습니다.
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => '라우팅에서 언더바(_) 폴더를 사용했을때 어떤 이점이 있나요?',
                'BoardComment' => <<<EOT
        안녕하세요, 강의 잘 듣고 있습니다!
        강의를 듣다보니 하나 의문점이 들어 질문드립니다.

        app 폴더 하위에서 "page.tsx"로 만들면 nextjs에서 자동으로 라우팅하여 경로로 인식한다고 설명해주셨는데요. 강의를 듣다보니 언더바를 붙인 폴더 경로는 라우팅에 포함되지 않는다고 이야기를 하시더라구요.



        파일명을 page로 만들지 않으면 라우팅에 포함되지 않는데, 언더바 폴더를 사용하는 이유가 있는지 궁금합니다.



        공식 문서에서는 명시적인 구분/이름 충돌 방지등 이점 설명이 있지만, 크게 와닿지 않아서 질문드려요!
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => 'iPhone simulator의 아래와 같은 오류',
                'BoardComment' => <<<EOT
        [ERROR:flutter/shell/platform/darwin/graphics/FlutterDarwinContextMetalImpeller.mm(42)] Using the Impeller rendering backend.



        코팩님. 실행은 정상적으로 되지만 위와 같은 오류가 있는데 인터넷 검색해 보니 프로그램에서 바꾸면 된다고 나오는데, 근본적인 해결책은 없을까요? 셋팅 등에서..
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => '제가 만든 웹사이트 너드작업소 피드백을 받을 수 있을까요?',
                'BoardComment' => <<<EOT
        안녕하세요~

        주변 지인들랑 같이 작게 웹페이지 하나 만들었는데 피드백을 받아보고 싶습니다!

        * 홈페이지 링크 : https://nerd-work-space.vercel.app (PC에서만 접근 가능합니다)

        --
        온라인 작업공간 <너드 작업소>

        혼자서 외롭게 새벽 코딩하는 분들..

        혼자 포트폴리오 만드느라 외로운 디자이너 분들..

        블로거, 웹소설 작가, 영상 편집자 등등 혼자 PC 작업하기 심심하신 분들!

        같이 모여서 작업할 수 있는 온라인 작업 공간 '너드 작업소' 웹페이지 한번 둘러봐주시면 감사하겠습니다🥺


        오늘 해야할 목표도 설정할 수 있고,

        목표 작업시간을 달성하면 1pixel씩 낙서할 수 있는 게임 요소도 넣어보았습니다 🙌🏻

        한번 써봐주시고 의견 남겨주시면 열심히 개선해나가볼게요!!

        버그 제보도 환영합니다 ㅎㅎ
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);
            

                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => '왜 순수한 자바로 테스트 해야 하나요?',
                'BoardComment' => <<<EOT
        학습하는 분들께 도움이 되고, 더 좋은 답변을 드릴 수 있도록 질문전에 다음을 꼭 확인해주세요.

        1. 강의 내용과 관련된 질문을 남겨주세요.
        2. 인프런의 질문 게시판과 자주 하는 질문(링크)을 먼저 확인해주세요.
        (자주 하는 질문 링크: https://bit.ly/3fX6ygx)
        3. 질문 잘하기 메뉴얼(링크)을 먼저 읽어주세요.
        (질문 잘하기 메뉴얼 링크: https://bit.ly/2UfeqCG)

        질문 시에는 위 내용은 삭제하고 다음 내용을 남겨주세요.
        =========================================
        [질문 템플릿]
        1. 강의 내용과 관련된 질문인가요? (예/아니오)

        네


        2. 인프런의 질문 게시판과 자주 하는 질문에 없는 내용인가요? (예/아니오)

        네


        3. 질문 잘하기 메뉴얼을 읽어보셨나요? (예/아니오)

        네

        [질문 내용]
        1. 제목과 같은 내용입니다. 강의 어느 편인가 해당 내용에 대해서 짧게 답변 해주신 부분을 어렴풋이 본거 같은데 잊어서 질문 드립니다. 해당 질문에 대한 답변 또는 관련 영상을 혹시 아신다면 감사 드릴거 같습니다.

        2. 해당 질문에 대한 원인은 다음과 같습니다. 순수한 자바 코드가 스프링 프레임워크를 포함한 것보다 상대적으로 작은 범위여서 일단 공통 부분인 자바 파트에서 테스트를 하고 그 다음 스프링으로 가는 것이 맞겠다는게 처음 생각이었습니다. 근데 문득 이게 맞나 ? 명확한 근거가 아닌 저의 추측에 기반한 근거였기 때문에 1번의 설명과 같이 모호해서 질문을 드립니다.

        개발자인데 아직도 문서를 두서 없이 작성합니다.
        해당 부분에 있어 양해를 구합니다.
        읽어주셔서 감사합니다.
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => 'Autowired 관련 질문',
                'BoardComment' => <<<EOT
        학습하는 분들께 도움이 되고, 더 좋은 답변을 드릴 수 있도록 질문전에 다음을 꼭 확인해주세요.

        1. 강의 내용과 관련된 질문을 남겨주세요.
        2. 인프런의 질문 게시판과 자주 하는 질문(링크)을 먼저 확인해주세요.
        (자주 하는 질문 링크: https://bit.ly/3fX6ygx)
        3. 질문 잘하기 메뉴얼(링크)을 먼저 읽어주세요.
        (질문 잘하기 메뉴얼 링크: https://bit.ly/2UfeqCG)

        질문 시에는 위 내용은 삭제하고 다음 내용을 남겨주세요.
        =========================================
        [질문 템플릿]
        1. 강의 내용과 관련된 질문인가요? (예/아니오)
        2. 인프런의 질문 게시판과 자주 하는 질문에 없는 내용인가요? (예/아니오)
        3. 질문 잘하기 메뉴얼을 읽어보셨나요? (예/아니오)

        [질문 내용]
        의존관계 자동주입에 대해 정리를 하던도 중 제가 이해한것이 맞는지 궁금하여 질문드립니다.



        컨테이너에 빈을 등록하는 방법에는 대표적으로,

        1.컴포넌트 스캔을 통해 등록하는 방법

        2. 자바설정클래스를 통해 등록하는 방법

        3 xml 파일을 통해 등록하는 방법

        이 있고 이때 의존관계주입을 2번과 3번에서는 직접 구현체를 정의? 해주었지만

        컴포넌트 스캔을 사용할때 의존관계주입을 (OCP와 DIP 원칙을 지키며) 해주기 위해선

        @Autowired 을 사용해야한다. 그리고 @Autowired 을 해주는 방법에는 아래와같은 방법이 있다.

        생성자주입
        필드주입
        setter 주입
        일반메서드 주입
        이렇게 이해하였는데 제가 이해 한 것이 맞나요?
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => 'N:M 을 1:N N:1 로 풀면 이런 모습일까요?',
                'BoardComment' => <<<EOT
        [질문 템플릿]
        1. 강의 내용과 관련된 질문인가요? 네
        2. 인프런의 질문 게시판과 자주 하는 질문에 없는 내용인가요? (예/아니오)
        3. 질문 잘하기 메뉴얼을 읽어보셨나요? 네

        [질문 내용]

        안녕하세요. 항상 영한님의 강의를 수강하며 재밌게 공부하고 있습니다.

        질문이 있습니다.
        Item & Category 를

        다대다가 아니라

        일대다 다대일로 연관관계 매핑을 할 때

        중간테이블을 직접 만든다면 다음과 같이 만들면 되는걸까요?

        ==
        @Entity
        public class Item {

        @Id @GeneratedValue
        @Column(name = "ITEM_ID")
        private Long id;

        private String name;

        private int price;

        private int stockQuantity;

        @OneToMany
        @JoinColumn(name = "ITEM_ID")
        private List<CategoryItem> categoryItems = new ArrayList<>();

        }
        ==

        ==
        @Entity
        public class CategoryItem {

        @Id @GeneratedValue
        @Column(name = "CATEGORY_ITEM_ID")
        private Long id;

        @ManyToOne
        @JoinColumn(name = "CATEGORY_ID")
        private Category category;

        @ManyToOne
        @JoinColumn(name = "ITEM_ID")
        private Item item;
        }
        ==

        ==
        @Entity
        public class Category {

        @Id @GeneratedValue
        @Column(name = "CATEGORY_ID")
        private Long id;

        private String name;

        @OneToMany
        @JoinColumn(name = "CATEGORY_ID")
        private List<CategoryItem> categoryItems = new ArrayList<>();

        @ManyToOne
        @JoinColumn(name = "PARENT_ID")
        private Category parent;

        @OneToMany(mappedBy = "parent")
        private List<Category> child = new ArrayList<>();
        }
        ==
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => '데이터 불균형',
                'BoardComment' => <<<EOT
        - 학습 관련 질문을 남겨주세요. 상세히 작성하면 더 좋아요!
        - 먼저 유사한 질문이 있었는지 검색해보세요.
        - 서로 예의를 지키며 존중하는 문화를 만들어가요.
        - 잠깐! 인프런 서비스 운영 관련 문의는 1:1 문의하기를 이용해주세요.



        안녕하세요. 데이터 불균형 수업 관련하여 질문드립니다.



        수업중에 알려주신 예시는 classification 문제에서의 데이터 불균형 해결 방법을 알려주셨는데요,

        혹시 regression 문제에서도 데이터 불균형 해결이 필요한것이 맞을까요? (예를들어 신장(키) 학습 시 평균 키를 가지는 샘플이 많은 경우)



        regression 문제에서 데이터 불균형이 있을 경우, 어떤 방법으로 해결할 수 있을지 궁금합니다!

        감사합니다.
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => 'Guard 이론 까지 학습 후 질문',
                'BoardComment' => <<<EOT
        안녕하세요.

        1강~가드이론까지만 학습후 질문드립니다. (파이프강의에서도 안나왔고 뒤에 강의에 왠지 안나올거같아서)



        클라이언트 요청이 컨트롤러까지 가면서

        미들 -> 가드 -> 인터셉터 -> 파이프

        의 단계를 거친다고 알려주셨는데

        nest 에서 이렇게 레이어를 나누어둔 이유, 순서가 이렇게된 이유가 있을까요?

        혹은 사실 하나의 레이어에서 동작하는건데 이해를 돕기위에 이런 단계를 거친다고 개념적으로만 나누어 둔것일까요?
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);



                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => 'BackUp DB > Failed',
                'BoardComment' => <<<EOT
        PostgreSQL 여러번 지우고 재설치 하여 backup DB restore 결과가 Failed 나오네요 문제가 뭘까요?
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => '완강 후 실습 관련 질문',
                'BoardComment' => <<<EOT
        안녕하세요! 항상 좋은 강의 만들어 주셔서 감사합니다.

        이번에 독하게 시작하는 C를 완강하고 자료구조를 듣는 중입니다. 그런데 C언어를 완강해도 능숙하게 다룰 수 있다는 느낌이 들지 않아서 C 코딩 예제를 플어보고 싶은데 혹시 추천해주실 만한 예제 사이트나 교재가 있으신가요?
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => 'MemberRepositoryTest',
                'BoardComment' => <<<EOT
        [질문 템플릿]
        1. 강의 내용과 관련된 질문인가요? (예/아니오)
        2. 인프런의 질문 게시판과 자주 하는 질문에 없는 내용인가요? (예/아니오)
        3. 질문 잘하기 메뉴얼을 읽어보셨나요? (예/아니오)

        [질문 내용]
        WARNING: A Java agent has been loaded dynamically (C:\Users\home\.gradle\caches\modules-2\files-2.1\net.bytebuddy\byte-buddy-agent\1.14.10\90ed94ac044ea8953b224304c762316e91fd6b31\byte-buddy-agent-1.14.10.jar)

        WARNING: If a serviceability tool is in use, please run with -XX:+EnableDynamicAgentLoading to hide this warning

        WARNING: If a serviceability tool is not in use, please run with -Djdk.instrument.traceUsage for more information

        WARNING: Dynamic loading of agents will be disallowed by default in a future release

        OpenJDK 64-Bit Server VM warning: Sharing is only supported for boot loader classes because bootstrap classpath has been appended

        테스트는 성공하는데 이렇게 경고문이 뜨는데 무시해도 될까요?? 구글링 해봐도 안나와서요
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => '복합명사 정제 관련 문의',
                'BoardComment' => <<<EOT
        선생님 안녕하세요~ 실습을 해보다 의문점이 생겨 글을 남깁니다.



        정제과정에서 혹시 두 단어로 만들어진 복합명사, 예를 들어 “국제법” 같은 경우 “국제” 와 ”법“으로 분석이 되는데요. 원글에 국제법으로 표기된 경우 이를 나누지 않고 ”국제법“으로 분석이 되게 할수 있는 방법이 있을까요?

        이것저것 해봤는데 적용이 안되어 선생님께 도움을 청합니다!

        감사합니다^^
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => 'MemoryMemberRepository',
                'BoardComment' => <<<EOT
        private static Map<Long, Member> store = new HashMap<>();
        private static long sequence = 0L;

        @Override
        public Member save(Member member) {
        member.setId(++sequence);
        store.put(member.getId(), member);
        return member;
        }



        여기서 궁금한게 save 메서드에서 왜 member를 return 하나요?

        return 된 member를 사용하는 곳은 어디에도 안보이는데 왜 return 하는지 궁금합니다.
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => 'SpringDataJpa 테스트 오류',
                'BoardComment' => <<<EOT

        1

        학습하는 분들께 도움이 되고, 더 좋은 답변을 드릴 수 있도록 질문전에 다음을 꼭 확인해주세요.

        1. 강의 내용과 관련된 질문을 남겨주세요.
        2. 인프런의 질문 게시판과 자주 하는 질문(링크)을 먼저 확인해주세요.
        (자주 하는 질문 링크: https://bit.ly/3fX6ygx)
        3. 질문 잘하기 메뉴얼(링크)을 먼저 읽어주세요.
        (질문 잘하기 메뉴얼 링크: https://bit.ly/2UfeqCG)

        질문 시에는 위 내용은 삭제하고 다음 내용을 남겨주세요.
        =========================================
        [질문 템플릿]
        1. 강의 내용과 관련된 질문인가요? (예/아니오)
        2. 인프런의 질문 게시판과 자주 하는 질문에 없는 내용인가요? (예/아니오)
        3. 질문 잘하기 메뉴얼을 읽어보셨나요? (예/아니오)

        [질문 내용]
        여기에 질문 내용을 남겨주세요.
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);



                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => 'request스코프와 컴포넌트 스캔',
                'BoardComment' => <<<EOT
        학습하는 분들께 도움이 되고, 더 좋은 답변을 드릴 수 있도록 질문전에 다음을 꼭 확인해주세요.

        1. 강의 내용과 관련된 질문을 남겨주세요.
        2. 인프런의 질문 게시판과 자주 하는 질문(링크)을 먼저 확인해주세요.
        (자주 하는 질문 링크: https://bit.ly/3fX6ygx)
        3. 질문 잘하기 메뉴얼(링크)을 먼저 읽어주세요.
        (질문 잘하기 메뉴얼 링크: https://bit.ly/2UfeqCG)

        질문 시에는 위 내용은 삭제하고 다음 내용을 남겨주세요.
        =========================================
        [질문 템플릿]
        1. 강의 내용과 관련된 질문인가요? (예/아니오)
        2. 인프런의 질문 게시판과 자주 하는 질문에 없는 내용인가요? (예/아니오)
        3. 질문 잘하기 메뉴얼을 읽어보셨나요? (예/아니오)

        [질문 내용]
        안녕하세요. 복습 중 궁금한 점이 생겨서 질문드립니다.

        컴포넌트 스캔을 하게 되면 @component annotation이 붙은 객체를 스프링빈으로 등록해주는 것으로 알고 있습니다. 그런데 이 객체가 request 스코프일 경우 request요청이 있어야 스프링 빈으로 등록이 가능하다면 처음 스프링 애플리케이션을 실행할 때 @Component가 붙은 객체를 탐색하면서 @Scope("request")가 붙어있다면 스프링 컨테이너가 이 객체는 스프링빈으로 등록하지 않고 넘어가는 것인지 궁금합니다!
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => 'Unlocking Sustainable Business Solutions in Scotland`s Energy Landscape',
                'BoardComment' => <<<EOT
        학습하는 분들께 도움이 되고, 더 좋은 답변을 드릴 수 있도록 질문전에 다음을 꼭 확인해주세요.

        1. 강의 내용과 관련된 질문을 남겨주세요.
        2. 인프런의 질문 게시판과 자주 하는 질문(링크)을 먼저 확인해주세요.
        (자주 하는 질문 링크: https://bit.ly/3fX6ygx)
        3. 질문 잘하기 메뉴얼(링크)을 먼저 읽어주세요.
        (질문 잘하기 메뉴얼 링크: https://bit.ly/2UfeqCG)

        질문 시에는 위 내용은 삭제하고 다음 내용을 남겨주세요.
        =========================================
        [질문 템플릿]
        1. 강의 내용과 관련된 질문인가요? (예/아니오)
        2. 인프런의 질문 게시판과 자주 하는 질문에 없는 내용인가요? (예/아니오)
        3. 질문 잘하기 메뉴얼을 읽어보셨나요? (예/아니오)

        [질문 내용]
        안녕하세요. 복습 중 궁금한 점이 생겨서 질문드립니다.

        컴포넌트 스캔을 하게 되면 @component annotation이 붙은 객체를 스프링빈으로 등록해주는 것으로 알고 있습니다. 그런데 이 객체가 request 스코프일 경우 request요청이 있어야 스프링 빈으로 등록이 가능하다면 처음 스프링 애플리케이션을 실행할 때 @Component가 붙은 객체를 탐색하면서 @Scope("request")가 붙어있다면 스프링 컨테이너가 이 객체는 스프링빈으로 등록하지 않고 넘어가는 것인지 궁금합니다!
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => 'vitest를 설치했는데 이 작업 영역에서 아직 발견된 테스트가 없습니다.라는 문구가 떠서 테스트를 진행할 수 없습니다..',
                'BoardComment' => <<<EOT
        안녕하세요.

        2.1 단위 테스트란 무엇일까? 강의를 들으며 따라하고 있습니다.

        강의에서 진행하고 있는 unit-test-example 브랜치에서 TextField.spec.jsx 파일을 따라 치며 테스트를 하려고 하는데 vscode 테스트 메뉴에서 '이 작업 영역에서 아직 발견된 테스트가 없습니다.'라는 문구와 '추가 테스트 확장 설치'라는 버튼만 떠서 테스트 진행을 하지 못하고 있습니다.

        강의에서 소개해주신 vitest를 설치하고 vscode를 껐다가 다시 켜봐도 테스트를 찾을 수 없다고 뜨고 있는데 제가 어떻게 하면 될까요?
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => 'The Best AI Tools to Make You a Better Writer in December 2024',
                'BoardComment' => <<<EOT
        Hello, friends who love writing in the tech world! You know how technology keeps changing? Well, we have some cool friends in tech that can help us be better writers. 

        They're called AI tools, and they make our writing better and more fun. Today, let's check out two popular ones: the CollegeEssay.org AI Writing Tool and the 5StarEssays.com AI Essay Writer. 

        We'll see how these friends can make you a great writer! Let's explore the world of AI and make our writing journey super exciting.



        CollegeEssay.org AI Writing Tool
        Before knowing about CollegeEssay.org AI essay writer, it's crucial to understand the foundation upon which it stands. 

        CollegeEssay.org is not just an AI writing tool; it is an online essay writing service designed to assist students and writers at various levels. With a commitment to academic excellence.

        Whether you're a student grappling with tight deadlines or a writer seeking expert guidance, CollegeEssay.org provides a supportive environment for honing your writing skills.

        Now, let's explore how the CollegeEssay.org essay generator, an integral part of this service, takes writing assistance to the next level.

        Features and Capabilities
        The tool offers a range of features, including automatic grammar and style checks, plagiarism detection, and suggestions for improving sentence structure. These capabilities ensure that the final written piece meets high standards of quality.

        CollegeEssay.org AI Essay Writing Tool is well-known for being really good at helping students with their assignments. It uses a big database to make sure the results fit what you need.



        How it Assists in Essay Writing
        CollegeEssay.org AI goes beyond basic grammar checks. It assists in crafting well-structured essays by providing insights into improving coherence, clarity, and overall writing style. Users report a significant enhancement in their writing skills after integrating this tool into their routine.



        5StarEssays.com Essay Writer
        Another noteworthy player in the era of AI writing tools is the essay writer from 5StarEssays.com.
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => 'pagination 페이지 번호 유지하고 싶습니다.',
                'BoardComment' => <<<EOT
        예시로 pagination을 통해 4번째 게시물 목록을 보고 있는데

        여기서 새로 고침을 하거나

        4번 게시물 목록의 해당 게시글 클릭해서 들어가고 다시 뒤로 가기를 통해 게시물 목록으로 이동이 되었을 때

        4번 게시물 목록이 아닌 1번 게시물 목록으로 초기화가 되는데

        저는 4번 게시물 목록으로 유지하고 싶습니다.



        다른 사이트의 게시물 홈페이지를 참고해 보면 page=4 이런 식으로 주소 창에 입력이 되어있는데 pages폴더에 폴더를 추가해서 유지를 해야 하나요?

        인프런에서 질문 & 답변 부분에서도 다음과 같이 사용되고 있습니다.

        https://www.inflearn.com/community/questions?page=2&order=recent



        만약 폴더를 추가 해야 한다면 다음과 같이 폴더가 있을 때

        boards 하위 폴더에 추가하고 해당 page폴더 안에

        [boardId], new 폴더를 넣어야 할 까요?
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => '비동기 씬로딩관련해서 질문있습니다.',
                'BoardComment' => <<<EOT
        예제에서는 매니저들을 관리하기위해서 모노비헤비어를 상속하지않은상태에서 매니저들을 받아서 관리하게 돼있는데 씬매니저를 만들면서 비동기 씬이동을 구현해보고 싶어서 해보고있는데 모노비헤비어가 상속되지않은 클래스에서는 코루틴을 사용할수가없다보니까 어떻게 해야할지 막혔습니다...

        기존의 씬매니저에서



        IEnumerator LoadAsynchronouslytime(string name)

        {

        AsyncOperation operation = SceneManager.LoadSceneAsync(name);

        operation.allowSceneActivation = false;

        float elapsedTime = 0f;

        while (!operation.isDone)

        {

        elapsedTime += Time.deltaTime;

        Debug.Log(elapsedTime);

        slider.value = elapsedTime / 10f;

        if (elapsedTime > 10f)

        {

        operation.allowSceneActivation = true;

        }

        yield return null;

        }

        }

        이런식으로 비동기 코드를 작성했는데요..

        코루틴을 사용하면 정상작동을 하긴하는데 모노비헤비어를 상속받지않은 상태에서 어떻게 사용하는지 감이 안잡힙니다.
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => '톰캣이 웰컴 페이지를 찾는 과정이 궁금합니다.',
                'BoardComment' => <<<EOT
        학습하는 분들께 도움이 되고, 더 좋은 답변을 드릴 수 있도록 질문전에 다음을 꼭 확인해주세요.

        1. 강의 내용과 관련된 질문을 남겨주세요.
        2. 인프런의 질문 게시판과 자주 하는 질문(링크)을 먼저 확인해주세요.
        (자주 하는 질문 링크: https://bit.ly/3fX6ygx)
        3. 질문 잘하기 메뉴얼(링크)을 먼저 읽어주세요.
        (질문 잘하기 메뉴얼 링크: https://bit.ly/2UfeqCG)

        질문 시에는 위 내용은 삭제하고 다음 내용을 남겨주세요.
        =========================================
        [질문 템플릿]
        1. 강의 내용과 관련된 질문인가요? (예)
        2. 인프런의 질문 게시판과 자주 하는 질문에 없는 내용인가요? (예)
        3. 질문 잘하기 메뉴얼을 읽어보셨나요? (예)

        [질문 내용]
        안녕하세요. 학습하다가 궁금한 점이 생겨 질문 글을 남깁니다.

        url 창에 localhost:8080을 입력하면 웰컴 페이지(index.html)가 이전에 는 잘 떳는데 웰컴페이지를 조금 항목이 많은 html 페이지로 바꾸고 나니까 whitelabel 에러가 뜨더군요. 한참 여기저기 뒤져보다가 어떤 글에서 index.html은 main.resources.static 디렉토리 경로에 존재해야 한다고 하더라고요? 그래서 index.html을 해당 디렉토리에 두니까 다시 잘 도되더군요 근데 강의를 들었을 때는 main.webapp에 index.html에 둔 상태로 코딩을 했었을 때도 문제 없이 잘 되는 거 같은데 제가 강의를 들으면서 놓친 부분이 있는지 모르겠습니다. 왜 톰캣이 main.webapp에 존재하는 index.html을 못 찾았을까요? 그리고 왜 main.resources.static에 index.html을 추가로 만드니까 잘 찾아낼까요? 원리가 궁금합니다. 바쁘신 와중에 답변 주시면 정말 감사하겠습니다!
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => 'The Best AI Tools to Make You a Better Writer in December 2024',
                'BoardComment' => <<<EOT
        Hello, friends who love writing in the tech world! You know how technology keeps changing? Well, we have some cool friends in tech that can help us be better writers. 

        They're called AI tools, and they make our writing better and more fun. Today, let's check out two popular ones: the CollegeEssay.org AI Writing Tool and the 5StarEssays.com AI Essay Writer. 

        We'll see how these friends can make you a great writer! Let's explore the world of AI and make our writing journey super exciting.



        CollegeEssay.org AI Writing Tool
        Before knowing about CollegeEssay.org AI essay writer, it's crucial to understand the foundation upon which it stands. 

        CollegeEssay.org is not just an AI writing tool; it is an online essay writing service designed to assist students and writers at various levels. With a commitment to academic excellence.

        Whether you're a student grappling with tight deadlines or a writer seeking expert guidance, CollegeEssay.org provides a supportive environment for honing your writing skills.

        Now, let's explore how the CollegeEssay.org essay generator, an integral part of this service, takes writing assistance to the next level.

        Features and Capabilities
        The tool offers a range of features, including automatic grammar and style checks, plagiarism detection, and suggestions for improving sentence structure. These capabilities ensure that the final written piece meets high standards of quality.

        CollegeEssay.org AI Essay Writing Tool is well-known for being really good at helping students with their assignments. It uses a big database to make sure the results fit what you need.



        How it Assists in Essay Writing
        CollegeEssay.org AI goes beyond basic grammar checks. It assists in crafting well-structured essays by providing insights into improving coherence, clarity, and overall writing style. Users report a significant enhancement in their writing skills after integrating this tool into their routine.



        5StarEssays.com Essay Writer
        Another noteworthy player in the era of AI writing tools is the essay writer from 5StarEssays.com.
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => 'firebase 관련오류',
                'BoardComment' => <<<EOT
        안녕하세요..

        사용자 인증 시 아래와 같은

        예외가 발생합니다.



        FirebaseAuthException ([firebase_auth/too-many-requests] We have blocked all requests from this device due to unusual activity. Try again later.)



        여기저기 찾아봐도 이유를 모르겠습니다

        혹시, 이유를 아시면 답변 부탁드리겠습니다.

        감사합니다.
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);

            

                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => 'Cache-Control: no-cache 질문',
                'BoardComment' => <<<EOT
        학습하는 분들께 도움이 되고, 더 좋은 답변을 드릴 수 있도록 질문전에 다음을 꼭 확인해주세요.

        1. 강의 내용과 관련된 질문을 남겨주세요.
        2. 인프런의 질문 게시판과 자주 하는 질문(링크)을 먼저 확인해주세요.
        (자주 하는 질문 링크: https://bit.ly/3fX6ygx)
        3. 질문 잘하기 메뉴얼(링크)을 먼저 읽어주세요.
        (질문 잘하기 메뉴얼 링크: https://bit.ly/2UfeqCG)

        질문 시에는 위 내용은 삭제하고 다음 내용을 남겨주세요.
        =========================================
        [질문 템플릿]
        1. 강의 내용과 관련된 질문인가요? (예/아니오)
        2. 인프런의 질문 게시판과 자주 하는 질문에 없는 내용인가요? (예/아니오)
        3. 질문 잘하기 메뉴얼을 읽어보셨나요? (예/아니오)

        [질문 내용]
        안녕하세요.
        강의를 듣다가 Cache-Control: no-cache 관련한 질문이 있어서 질문 드립니다.

        만약에 데이터를 요청할 때 캐시 유효시간이 남았다면 서버와의 네트워크 통신이나 요청메시지, 응답메시지 없이 브라우저 캐시 저장소에서 데이터를 가져오는 게 맞나요?
        1번이 맞다면 Cache-Control: no-cache 를 하면 캐시 유효시간이 남아 서버와의 통신이 필요 없는데도 불구하고 원 서버와의 통신을 통해 검증한다고 이해하면 될까요??
        클라이언트가 원 서버에 검증하고 사용하기 위해서 Cache-Control: no-cache를 요청 메시지에서 사용하는 건가요? 아니면 클라이언트에게 원 서버와의 검증을 강제(?)하기 위해서 서버의 응답 메시지에서 사용하는 건가요??
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => '6-6 메인지표 SQL쿼리 짜보기',
                'BoardComment' => <<<EOT
        안녕하세요, 선생님. 이번 강의에서 질문이 하나 더 있었습니다! 앞에 남긴 질문과 한꺼번에 남길걸 그랬네요..😅  선생님께서 추천을 통한 주문 전환률 (CVR) 을 구하기 위해 작성한 쿼리를 보니# 선생님 풀이 SELECT event_date , use_recomend_payment / click_recomend_food AS recommend_cvr FROM( SELECT event_date , COUNTIF(event_name = " click_payment" AND use_recommend_food = "TRUE") AS use_recomend_payment #추천음식 클릭하여 결제 , COUNTIF(event_name = "click_recommend_food")  AS click_recommend_food #추천음식 클릭 FROM log WHERE is_meet_min_order_price = 'False' GROUP BY event_date ) AS temp
        1) 추천상품 클릭하여 전환된 횟수 ( use_recomend_payment)와, 추천음식을 클릭한 횟수(click_recommend_food) 를 구해서 from절 서브쿼리에 넣기2) 추천상품 클릭하여 전환된 횟수 / 추천음식 클릭 횟수 연산하여 recommend_cvr 구하기
        이렇게 from 절을 써야하더라구요.  선생님의 해설을 보기 전, 스스로 풀었을 때는 from절을 쓰지 않고 그냥 한번에 썼었습니다. #셀프풀이 SELECT event_date , COUNTIF(event_name = " click_payment" AND use_recommend_food = "TRUE") AS use_recomend_payment #추천음식 클릭하여 결제 , COUNTIF(event_name = "click_recommend_food")  AS click_recommend_food , COUNTIF(event_name = " click_payment" AND use_recommend_food = "TRUE") / COUNTIF(event_name = "click_recommend_food") AS recommend_cvr FROM log WHERE is_meet_min_order_price = 'False' GROUP BY event_date혹시 이렇게 한번에 쓰면 오류가 발생하는지, 서브쿼리를 사용하여 풀어야 하는 이유가 무엇인지 궁금합니다! 여유있으실 때 회신 주세요.감사합니다! 
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => '6-6 메인지표 SQL쿼리 짜보기',
                'BoardComment' => <<<EOT
        Model model 파라미터를 넘기면서

        model.addAttribute() 메서드의 동작원리에 대해 갑자기 궁금증이 생겼는데, 현재 로직이 /basic/items 으로 웹페이지가 넘어가면 items 메서드가 호출되면서 model.addAttribute("items",item); 메서드를 통해 모델에 items라는 이름에 items 객체가 저장이 되잖아요



        새로운 아이템을 등록한 뒤에, 다시 /basic/items 페이지로 넘어가게 된다면 다시 items 메서드가 호출될텐데 이때 다시 로직이 돌면서 model.addAttribute("items", item); 메서드가 호출이 될텐데, 이럴때에는 items 이름에 정보를 덮어씌우는 방식으로 모델에 넘어가는건가요? 아니면 items객체에 수정된 부분만 고쳐서 모델에 넘어가는건가요??
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => '파일 경로 설정',
                'BoardComment' => <<<EOT
                =================

        현업자인지라 업무때문에 답변이 늦을 수 있습니다. (길어도 만 3일 안에는 꼭 답변드리려고 노력중입니다 ㅠㅠ)

        강의에서 다룬 내용들의 질문들을 부탁드립니다!! (설치과정, 강의내용을 듣고 이해가 안되었던 부분들, 강의의 오류 등등)
        이런 질문은 부담스러워요.. (답변거부해도 양해 부탁드려요)
        개인 과제, 강의에서 다루지 않은 내용들의 궁금증 해소, 영상과 다른 접근방법 후 디버깅 요청, 고민 상담 등..
        글쓰기 에티튜드를 지켜주세요 (저 포함, 다른 수강생 분들이 함께보는 공간입니다.)
        서로 예의를 지키며 존중하는 문화를 만들어가요.
        질문글을 보고 내용을 이해할 수 있도록 남겨주시면 답변에 큰 도움이 될 것 같아요. (상세히 작성하면 더 좋아요! )
        먼저 유사한 질문이 있었는지 검색해보세요.
        잠깐! 인프런 서비스 운영 관련 문의는 1:1 문의하기를 이용해주세요.
        ==================

        즐거운 연말 보내시는 와중에 별거아닌 질문을 드리는것 같아 죄송합니다 ㅠㅠ



        [진행사항]

        Verilog HDL 1 강의를 수강하며, C드라이브에 Linux 환경을 구축한 뒤, 실습파일을 다운받아 실습을 진행했습니다.
        이번 FPGA 강의를 수강하게 되며 VItis 설치를 하게 되었는데, C드라이브의 용량이 부족하게되어 D드라이브를 새로 구축하였습니다.
        이후 Vitis (Window)를 D드라이브에 설치 후 정상동작함을 확인하였습니다.


        [질문사항]

        제공실습 파일을 넣으실 때(강의 01:48), C드라이브의 FPGA라는 파일에 넣으셨는데, D드라이브에서 진행하게 될 경우 똑같이 D드라이브 내에 FPGA라는 파일을 생성하고 실습을 진행하면 되는지가 궁금합니다.
        Vivado 프로젝트 실행 후, Project 생성 시, 파일경로가 C드라이브로 자동설정되는데 기존 파일이 있는 D드라이브로 잡아줘야 하는지 궁금합니다.


        아래에는 C드라이브, D드라이브 경로 사진입니다.

        [C드라이브]


        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => '토큰쿠키저장에 대해서 질문드립니다.',
                'BoardComment' => <<<EOT
                =================
        강의에서 토큰을 보관하기에 보안에도 좋고 적절한 곳이 쿠키라고 말씀해주셨는데 보통 쿠키에 저장을 많이 하는편일까요?

        내년 하반기에 크롬에서 쿠키차단예정을 하고 있다고 들어서 왠지 다른 대체제가 필요할거같은데 쿠키를 사용 못하게 된다면 보통 클라이언트에서는 로컬스토리지 이외에는 대체제가 없는지 궁금합니다.
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => '실행이 잘되었지만 그래서 오히려 납득이 안되는 부분이 있습니다.',
                'BoardComment' => <<<EOT
        안녕하세요 선생님. 좋은 강의 진심으로 감사드립니다.

        실행이 잘 됩니다. 왜 잘 되지?하며 이해가 안되는 부분이 있어서 질문드립니다.

        Attendance.jsx 코드를 보면 함수 정의 후 Attendance함수만을 export 하고 있습니다.
        students 배열은 export되지 않고 있어
        Attendance함수를 index.js에 불러가서 거기서 사용하면 거기는 students 배열은 불러가지 않았기 때문에
        정의되지 않았다며 오류가 떠야할 것 같은 느낌이 들었는데 잘 실행이 되었습니다.
        함수만을 export했는데 어떻게 students배열까지 index.js에서 잘 사용할 수 있는걸까요?

        그리고 간단한 추가질문이 하나 더 있습니다.
        저번 강의에서 리스트의 키값을 지정해주지 않으면 리액트에서는 자동으로 인덱스를 키값으로 설정한다라는 말씀을 잠깐하셨습니다.
        그런데 왜 키값을 지정해주지 않았을 때 오류가 뜨는걸까요?
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

            Board::create([
                'BoardCategoryID' => 1,
                'UserID' => $user,
                'ClassID' => null,
                'BoardTitle' => 'Seeking Insights on 오픽 (OPIC) Proficiency Levels 🇰🇷',
                'BoardComment' => <<<EOT
        I hope this message finds you well. I'm currently navigating the realm of 오픽 등급 proficiency, and I'm eager to connect with others who have experience or insights to share.

        OPIC Levels Clarification: I'm curious about the various proficiency levels in OPIC. Could someone shed light on what each level entails, and what kind of language skills are expected at different stages?

        Preparation Strategies: For those who have successfully advanced through OPIC levels, do you have any tips or strategies for effective preparation? What resources or methods proved most helpful in honing your language skills?

        Common Challenges: In your experience, what are some common challenges people face when aiming to improve their OPIC scores? Are there particular aspects of the test that test-takers often find challenging?

        Real-Life Applications: How has achieving a specific OPIC level impacted your daily life, career, or academic pursuits? I'm interested in hearing about real-life applications and the practical benefits of OPIC proficiency.

        Any Recent Changes or Updates: As language tests evolve, have there been any recent changes or updates to the OPIC system that test-takers should be aware of?
        EOT,
                'BoardView' => $view,
                'BoardRecommended' => $view,
                'BoardNotRecommended' => $view,
                'BoardFlg' => $flg,
                'created_at' => $date,
            ]);


                    $date = $faker->dateTimeBetween('-1 years');
            $user = $faker->numberBetween(1, 20);
            $view = $faker->randomNumber(2);
            $flg = $faker->randomElement([0,1]);

        }


        
    }
}
