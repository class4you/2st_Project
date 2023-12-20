<template>
    <div>
        <div class="board_detail_wrap">
        <div class="whr"><span>게시판</span><span>></span><span>게시판</span></div><!-- whr -->
        <section class="mainSectionpost">
            <section class="mainSec row jcB">
                <div class="postBox">
                    <div class="postInfo row aiC jcB">
                        <div>
                            <p>작성자<span>{{ newBoardItem.UserEmail }}</span></p>
                        </div>
                        <div class="row aiC">
                            <p>작성일<span>2023.12.11</span></p>
                            <p>조회수<span>{{newBoardItem.Board}}</span></p>
                            <p>좋아요<span>9999</span></p>
                        </div>
                    </div>
                    <div class="postTitBox row aiC">
                        <label for="postTit">제목: </label>
                        <p type="text" id="postTit">{{ newBoardItem.BoardTitle }}</p>
                    </div>
                    <div class="postContBox row">
                        <label for="postCont">내용</label>
                        <p class="postCont">{{ newBoardItem.BoardComment }}</p>
                    </div>
                    <div class="laguage">
                        <ul class="row aiC laguage_gap_10">
                            <li>React</li>
                            <li>JS</li>
                            <li>CSS</li>
                            <li>HTML</li>
                            <li>LARAVEL</li>
                            <li>React</li>
                        </ul>
                    </div>
                    <div class="reco row jcC">
                        <div class="row aiC">
                            <p>0</p>
                            <button><i class="fas fa-thumbs-up" style="font-size: 20px;"></i></button>
                        </div>
                        <div class="row aiC">
                            <button><i class="fas fa-thumbs-down" style="font-size: 20px;"></i></button>
                            <p>0</p>
                        </div>
                    </div>
                </div>
        
                <div class="reviewBox border-t-none">
                    <div class="number">
                        <p>답변<span>0</span></p>
                    </div>
                    <div class="reviewList">
                        <p class="board_detail_user_id">유저 아이디</p>
                    </div>
                    <div class="reviewPost row jcB">
                        <textarea placeholder="댓글을 입력해주세요."></textarea>
                        <button type="button">저장</button>
                    </div>
                </div>
                <div class="reviewBox border-t-none">
                    <div class="reviewList">
                        <div class="item">
                            <div class="commentInfo row aiC jcB">
                                <p>작성자<span> {{data.CommentID}}</span></p>
                                <p>작성일<span>{{ data.created_at }}</span></p>
                            </div>
                            <div class="commentText">
                             <span>{{ data.CommentContent }}</span>   
                            </div>
                            
                            <div class="commentActions row aiC">
                                <div>
                                    <button class="editBtn">수정</button>
                                    <button class="deleteBtn">삭제</button>
                                    <button class="reportBtn">신고</button>
                                </div>
                                <div class="Board_good_bad">
                                    <button type="button" class="Board_Good " aria-label="좋아요">
                                      <i class="fa-solid fa-thumbs-up"></i>
                                    </button>
                                    <p class="vote-count e-vote-count" aria-label="투표수">0</p>
                                    <button type="button" class="Board_Bad" aria-label="싫어요">
                                      <i class="fa-solid fa-thumbs-down"></i>
                                    </button>
                                  </div>
                                
                            
                            </div>
                            <!-- <div class="Board_good_bad">
                                <button type="button" class="Board_Good " aria-label="좋아요">
                                  <i class="fa-solid fa-thumbs-up"></i>
                                </button>
                                <p class="vote-count e-vote-count" aria-label="투표수">0</p>
                                <button type="button" class="Board_Bad" aria-label="싫어요">
                                  <i class="fa-solid fa-thumbs-down"></i>
                                </button>
                              </div> -->
                        </div>
                        <!-- 다른 댓글들도 유사한 구조로 추가할 수 있습니다 -->
                    </div>

                
            </div>
        
            </section> 
        </section>
    </div>
    </div>
</template>
<script>
import axios from 'axios'

export default {
    name: 'BoardDetailComponent',
    props: ['BoardID', 'CommentID'],
    
    data() {
        return {
            clickFlgTab: 0,
            newBoardItem: [],
            commentItems: [],
            // 댓글 출력시 필요한 데이터
            BoardCommentData: {
                BoardID: this.BoardID,
                UserID: this.UserID,
                CommentID: this.CommentID,
                InstructorID: this.InstructorID,
                CommentContent: '',
            },
            EnrollChk:{},
        }
    },

    mounted() {
        this.fetchData();
    },
    updated() {

    },

    methods: {
        fetchData() {
        axios.get('/boarddetail/' + this.BoardID)
            .then(response => {
                console.log(response.data);
                this.newBoardItem = response.data;

                // 댓글을 받아오는 axios 처리
                axios.get('/boarddetailcomments/' + this.BoardID)
                // 두번째 API 응답에 대한 로직 수행
                .then(commentResponse => {
                console.log(commentResponse.data);
                this.commentItems = commentResponse.data;
                this.EnrollChk = commentResponse.data.EnrollChk; 
            })
            .catch(contentsError => {
                // 두번째 API 에러처리
                console.error(contentsError);
            });
        })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        },
        addBoardComment() {
            this.$store.dispatch('addBoardComment', this.BoardCommentData);
        },
        putBoardComment() {

        },
    },
}
    
    

</script>
<style>
    
</style>