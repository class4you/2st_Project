<template>
    <div class="wrapper">
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
                            <p>작성일<span>{{ newBoardItem.created_at }}</span></p>
                            <p>조회수<span>{{newBoardItem.BoardView}}</span></p>
                            <p>좋아요<span>{{newBoardItem.Recommended}}</span></p>
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
                    <div class="board_button">
                        <div  v-if="newBoardItem.UserID == $store.state.UserID"  class="row aiC">
                            <button @click="completeBoardData(newBoardItem.BoardID)" class="board_complete">해결</button>
                            <!-- <button @click="updateBoardData(newBoardItem.BoardID)" class="board_rewrite">수정</button> -->
                            <a :href="'/boardupdate/' + newBoardItem.BoardID" v-if="$store.state.UserID" class="board_rewrite">수정</a>
                            <button @click="deleteBoardData(newBoardItem.BoardID)" class="board_delete">삭제</button>
                        </div>
                        <!-- {{ newBoardItem }} -->
                    </div>
                </div>
        
                <div class="reviewBox border-t-none">
                    <div class="number">
                        <p>답변<span>0</span></p>
                    </div>
                    <div class="reviewList">
                        <p class="board_detail_user_id">{{nowUserID.UserEmail}}</p>
                    </div>
                    <div class="reviewPost row jcB">
                        <textarea placeholder="댓글을 입력해주세요." v-model="frmCommentData.CommentContent"></textarea>
                        <button type="button" @click="submitCommentData()">저장</button>
                    </div>
                </div>
                <div class="reviewBox border-t-none" style="padding: 10px 0px;">
                    <div v-for="item in newCommentItem" class="reviewList">
                        <div class="item">
                            <div class="commentInfo row aiC jcB">
                                <p class="comment_writer">작성자<span>{{ hideEmail(item.UserEmail) }}</span></p>
                                <p>작성일<span>{{ item.created_at }}</span></p>
                            </div>
                            <div class="commentText">
                             <span>{{ item.CommentContent }}</span>   
                            </div>
                            
                            <div class="commentActions row aiC">
                                <div v-if="item.UserID == $store.state.UserID" style="margin-left: auto;">
                                    <button class="editBtn">수정</button>
                                    <button @click="deleteCommentData(item.CommentID)" class="deleteBtn">삭제</button>
                                    <button class="reportBtn">신고</button>
                                    <!-- {{ item }} -->
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
                            <hr style="margin-top: 20px;">
                            
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
export default {
    name: 'BoardDetailComponent',

    props: ['BoardID'],

    data() {
        return {
            newBoardItem: {
            },
            nowUserID: {},
            newCommentItem: {
            },
            newComment: '', 

            frmCommentData: {
                UserID: this.$store.state.UserID,
                BoardID: this.BoardID,
                CommentID: this.CommnetID,
                CommentContent: '',
            },
        };
    },

    mounted() {
        this.fetchData();
    },

    methods: {
        fetchData() {
        axios.get('/boarddetail/' + this.BoardID)
            .then(response => {
            // console.log(response.data);
                this.newBoardItem = response.data.boardData;
                this.nowUserID = response.data.userID;
                this.newCommentItem = response.data.commentData;
                // console.log(response.data.commentData);
            })
            .catch(error => {
            console.error('Error fetching data:', error);
            });
        },
        hideEmail(email) {
			const atIndex = email.indexOf('@');
			const username = email.substring(0, Math.min(4, atIndex));
			const asterisks = '*'.repeat(atIndex - 4);
			return username + asterisks;
		},

        // 댓글 작성 불러오기
        submitCommentData() {
            this.$store.dispatch('submitCommentData', this.frmCommentData);
        },

        // 댓글 삭제 불러오기
        deleteCommentData(data) {
            this.$store.dispatch('deleteCommentData', data);
        },

        // 게시판 삭제 불러오기
        deleteBoardData(data) {
            this.$store.dispatch('delBoardData', data);
        },

        // 
        updateBoardData(data) {
            this.$store.dispatch('updateBoardData', data);
        },
    },
};
</script>
<style>
    
</style>