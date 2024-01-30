

SELECT *
FROM class_infos info
JOIN class_languagelinks link
ON info.ClassID = link.ClassID
JOIN class_languages lang
ON link.ClassLanguageID = lang.ClassLanguageID
WHERE info.ClassID = 1

ALTER TABLE boards CHANGE EnrollmentID UserID INT;
ALTER TABLE [테이블명] CHANGE [변경전컬럼명] [변경후컬럼명] [속성];

SELECT  *
FROM class_infos info
JOIN class_languagelinks link
ON info.ClassID = link.ClassID
JOIN class_languages lang
ON link.ClassLanguageID = lang.ClassLanguageID
WHERE lang.ClassLanguageName = 'HTML'

ALTER TABLE users ADD COLUMN UserDetailedAddress VARCHAR(255) AFTER UserRoadAddress

ALTER TABLE class_infos ADD COLUMN ClassPoint VARCHAR(1000) AFTER ClassIntroduction

ALTER TABLE boards ADD COLUMN BoardFlg CHAR(1) DEFAULT '0' AFTER BoardNotRecommended;

ALTER TABLE instructors ADD COLUMN InstructorHistory VARCHAR(255) AFTER InstructorPhoneNumber;

alter table class_infos add COLUMN 자료형;

ALTER TABLE lessons ADD COLUMN LessonProgress FLOAT DEFAULT '0' AFTER LessonVideoID;

ALTER TABLE lessons ADD COLUMN LessonRunningTime FLOAT DEFAULT '0' AFTER LessonProgress;

ALTER TABLE lessons ADD COLUMN LessonAllRunningTime FLOAT DEFAULT '0' AFTER LessonProgress;

ALTER TABLE lessons ADD COLUMN LessonFlg CHAR(1) DEFAULT '0' AFTER LessonProgress;

ALTER TABLE chapters ADD COLUMN chapterFlg CHAR(1) DEFAULT '0' AFTER ChapterTitle;

ALTER TABLE class_infos ADD COLUMN ClassFlg CHAR(1) DEFAULT '0' AFTER ClassDifficultyID;

ALTER TABLE enrollments ADD COLUMN EnrollmentFlg CHAR(1) AFTER ClassID;

ALTER TABLE instructors ADD COLUMN InstructorFlg CHAR(1) AFTER InstructorHistory;

ALTER TABLE email_auth_states ADD COLUMN EmailToken VARCHAR(255) DEFAULT '0' AFTER EmailStatus;

ALTER TABLE user_statuses ADD COLUMN SuspendedUntil TIMESTAMP AFTER SuspensionType;

ALTER TABLE board_languagelinks ADD COLUMN HTMLFlg CHAR(1) DEFAULT '0' AFTER BoardID;
ALTER TABLE board_languagelinks ADD COLUMN CSSFlg CHAR(1) DEFAULT '0' AFTER HTMLFlg;
ALTER TABLE board_languagelinks ADD COLUMN JavaScriptFlg CHAR(1) DEFAULT '0' AFTER CSSFlg;
ALTER TABLE board_languagelinks ADD COLUMN PHPFlg CHAR(1) DEFAULT '0' AFTER JavaScriptFlg;
ALTER TABLE board_languagelinks ADD COLUMN JAVAFlg CHAR(1) DEFAULT '0' AFTER PHPFlg;
ALTER TABLE board_languagelinks ADD COLUMN DataBaseFlg CHAR(1) DEFAULT '0' AFTER JAVAFlg;

ALTER TABLE boards ADD COLUMN BoardCategoryID CHAR(1) DEFAULT '0' AFTER EnrollmentID;

ALTER TABLE users ADD COLUMN UserState CHAR(1) DEFAULT '0' AFTER UserPrivacy;
ALTER TABLE boards ADD COLUMN BoardInstructorFlg CHAR(1) DEFAULT '0' AFTER BoardFlg;

SELECT *
FROM reviews re
	JOIN enrollments enroll
	ON enroll.EnrollmentID = re.EnrollmentID
	JOIN class_infos info
	ON info.ClassID = enroll.ClassID
	JOIN users u
	ON enroll.UserID = u.UserID
	JOIN class_infos infos
	ON enroll.ClassID = infos.ClassID
WHERE u.UserID = 9
AND infos.ClassID = 15
ORDER by enroll.created_at DESC;

SELECT *
FROM boards
ORDER BY BoardID DESC;

SELECT *
FROM users us
	join enrollments enr
	ON enr.UserID = us.UserID
	JOIN class_infos cin
	ON cin.ClassID = enr.ClassID
	WHERE us.UserID = 8

SELECT us.UserEmail, COUNT(*) cnt 
FROM comments cts
JOIN users us
ON cts.UserID = us.UserID
GROUP BY cts.UserID
ORDER BY cnt
LIMIT 10;

SELECT *
FROM comments
	JOIN boards
	ON boards.BoardID = comments.BoardID
	JOIN users
	ON comments.UserID = users.UserID
	WHERE comments.BoardID = 424

SELECT COUNT(*) AS totalChapters FROM chapters WHERE ClassID = 50

SELECT COUNT(*) AS completedChapters FROM chapters WHERE ClassID = 50 AND ChapterFlg = 1;

SELECT (completedChapters / totalChapters) * 100 AS progressPercentage
FROM (
    SELECT COUNT(*) AS totalChapters FROM chapters WHERE ClassID = 50
) total,
(
    SELECT COUNT(*) AS completedChapters FROM chapters WHERE ClassID = 50 AND ChapterFlg = 1
) completed;


SELECT info.ClassID, cha.ChapterID,  les.LessonID
FROM class_infos info
JOIN enrollments enr
ON info.ClassID = enr.ClassID
JOIN users us
ON enr.UserID = us.UserID
JOIN chapters cha
ON info.ClassID = cha.ClassID
JOIN lessons les
ON les.ChapterID = cha.ChapterID
WHERE us.UserID = 8

SELECT
	*,COUNT(sub.updated_at)
from	
(
	SELECT
		DATE_FORMAT(les.updated_at, '%Y%m%d') updated_at
	FROM class_infos cin
		JOIN chapters cha
			ON cin.ClassID = cha.ClassID
		JOIN lessons les
			ON les.ChapterID = cha.ChapterID
	WHERE les.updated_at >= 20231225
	  AND les.updated_at <= 20231231
	  AND les.ChapterID = 1
	  AND les.lessonFlg = '1'
) sub
GROUP BY sub.updated_at
;


SELECT
    sub.updated_at,
    COUNT(DISTINCT CASE WHEN sub.classFlag = 1 THEN sub.ClassID END) AS class_count,
    COUNT(DISTINCT CASE WHEN sub.chapterFlag = 1 THEN sub.LessonID END) AS chapter_count
FROM
(
    SELECT
        DATE_FORMAT(les.updated_at, '%Y%m%d') AS updated_at,
        cin.ClassID,
        MAX(CASE WHEN cin.ClassFlg = '1' THEN 1 ELSE 0 END) AS classFlag,
        MAX(CASE WHEN les.lessonFlg = '1' THEN 1 ELSE 0 END) AS chapterFlag,
        les.LessonID
    FROM class_infos cin
        JOIN chapters cha
            ON cin.ClassID = cha.ClassID
        JOIN lessons les
            ON les.ChapterID = cha.ChapterID
    WHERE les.updated_at >= '2023-12-25'
      AND les.updated_at <= '2023-12-31'
      AND cin.ClassID = 50
    GROUP BY les.updated_at, cin.ClassID, les.LessonID
) sub
GROUP BY sub.updated_at;

SELECT COUNT(*) AS comments_cnt
FROM boards
JOIN comments
ON boards.BoardID = comments.BoardID
GROUP BY boards.BoardID
ORDER BY comments_cnt desc

SELECT class_infos.ClassTitle, class_infos.ClassDescription, chapters.ChapterFlg
FROM users
JOIN enrollments ON users.UserID = enrollments.UserID
JOIN class_infos ON enrollments.ClassID = class_infos.ClassID
JOIN chapters ON class_infos.ClassID = chapters.ClassID
JOIN lessons ON chapters.ChapterID = lessons.ChapterID
WHERE users.UserID = 8
AND (class_infos.ClassID, class_infos.updated_at) IN (
    SELECT ClassID, MAX(updated_at) AS latest_updated_at
    FROM class_infos
    WHERE ClassID IN (SELECT ClassID FROM enrollments WHERE UserID = 8)
    GROUP BY ClassID
);

SELECT *
FROM class_infos
WHERE updated_at = (SELECT MAX(updated_at) FROM class_infos);

SELECT *
FROM users
JOIN enrollments ON users.UserID = enrollments.UserID
JOIN class_infos ON enrollments.ClassID = class_infos.ClassID
JOIN chapters ON class_infos.ClassID = chapters.ClassID
JOIN lessons ON chapters.ChapterID = lessons.ChapterID
WHERE users.UserID = 8
AND class_infos.updated_at = (SELECT MAX(class_infos.updated_at) FROM class_infos);


SELECT boards.BoardID ,COUNT(comments.CommentID)
FROM boards
JOIN comments 
ON boards.BoardID = comments.BoardID
GROUP BY boards.BoardID

SELECT
	boards.BoardID
	,boards.UserID
	,boards.BoardTitle
	,boards.BoardComment
	,boards.BoardView
	,boards.BoardRecommended
	,boards.BoardNotRecommended
	,boards.BoardFlg
	,users.UserEmail
	,com.cnt
FROM boards
	JOIN users
		ON boards.UserID = users.UserID
	JOIN (SELECT BoardID ,COUNT(BoardID) cnt FROM comments GROUP BY comments.BoardID) com
		ON com.BoardID = boards.BoardID
;


SELECT *
FROM class_infos
JOIN chapters
ON class_infos.ClassID = chapters.ClassID
JOIN lessons
ON chapters.ChapterID = lessons.ChapterID
WHERE class_infos.ClassID = 1
GROUP BY lessons.LessonID

SELECT *
FROM lessons
WHERE ChapterID = 1

SELECT *
FROM boards
JOIN board_languagelinks
ON boards.BoardID = board_languagelinks.BoardID
WHERE board_languagelinks.ClassLanguageID = 1
GROUP BY board_languagelinks

SELECT *
FROM board_languagelinks
WHERE board_languagelinks.BoardID = 954

SELECT *, COUNT(class_languages.ClassLanguageName)
FROM enrollments 
JOIN class_infos
ON enrollments.ClassID = class_infos.ClassID
JOIN class_languagelinks
ON class_infos.ClassID = class_languagelinks.ClassID
JOIN class_languages
ON class_languagelinks.ClassLanguageID = class_languages.ClassLanguageID
WHERE enrollments.UserID = 39
GROUP BY class_languages.ClassLanguageName

SELECT *
FROM enrollments
WHERE UserID = 31

SELECT *
FROM class_notes
JOIN enrollments
ON class_notes.enrollmentID = enrollments.enrollmentID
WHERE UserID = 24

SELECT *, SUM(PaymentAmount)
FROM class_payments
WHERE created_at BETWEEN '2024-01-01' and '2024-01-31'

DESCRIBE enrollments;

SELECT *
FROM enrollments
WHERE UserID = 55264

SELECT *
FROM boards
WHERE ClassID = 3


EXPLAIN SELECT
	cin.ClassID
	,cin.CategoryID
	,cin.ClassDifficultyID
	,cin.ClassTitle
	,cha.cha_cnt
	,lescnt.les_cnt
	,enr.enr_cnt
FROM class_infos cin
	JOIN (SELECT subcha.ClassID, COUNT(subcha.ClassID) AS cha_cnt FROM chapters subcha GROUP BY subcha.ClassID) cha ON cin.ClassID = cha.ClassID
	JOIN(
			SELECT
				cha2.ClassID
				,SUM(chales1.les_cnt) les_cnt
			FROM chapters cha2
				JOIN
				(
					SELECT
						cha1.ChapterID
						,les2.les_cnt
					FROM chapters cha1
						JOIN (SELECT les1.ChapterID, COUNT(les1.ChapterID) les_cnt FROM lessons les1 GROUP BY les1.ChapterID) les2
						ON cha1.ChapterID = les2.ChapterID
				) chales1
				ON cha2.ChapterID = chales1.ChapterID
			GROUP BY cha2.classID
		) lescnt ON cin.ClassID = lescnt.ClassID
	JOIN (SELECT enr1.ClassID, COUNT(enr1.ClassID) enr_cnt FROM enrollments enr1 GROUP BY enr1.ClassID) enr ON cin.ClassID = enr.ClassID;
	
	
EXPLAIN SELECT class_infos.ClassID, 
	class_infos.CategoryID, 
	class_infos.ClassDifficultyID,
	class_infos.ClassTitle, 
	class_infos.ClassPrice, 
	COUNT(DISTINCT enrollments.EnrollmentID), 
	COUNT(DISTINCT chapters.ChapterID), 
	COUNT(DISTINCT lessons.LessonID)
FROM class_infos
LEFT JOIN enrollments
ON class_infos.ClassID = enrollments.ClassID
LEFT JOIN chapters
ON class_infos.ClassID = chapters.ClassID
LEFT JOIN lessons
ON chapters.ChapterID = lessons.ChapterID 
GROUP BY class_infos.ClassID;

SELECT *
FROM board_rating_states
WHERE BoardID = 31


SELECT *
FROM boards
WHERE BoardID = 2266


SELECT *
FROM users
WHERE UserID = 8084

SELECT *
from instructors
WHERE instructors.InstructorEmail = 'qwer123@gmail.com'
TIMESTAMP