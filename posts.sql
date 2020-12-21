use blog;

create table posts (
    ID int AUTO_INCREMENT,
    title varchar(50),
    body varchar(5000),
    author varchar(50),
    created_at DATETIME default NOW(),
    PRIMARY KEY (ID)
    );

INSERT INTO `posts` (`title`, `body`, `author`)
 VALUES ('Moj blog', 'Nesto bi trebalo da pisem.', 'Aca Maca');
INSERT INTO `posts` (`title`, `body`, `author`)
 VALUES ('Najnoviji blog', 'Nesto sam juce napisao.', 'John Doe');
INSERT INTO `posts` (`title`, `body`, `author`)
 VALUES ('Najstariji blog', 'Pisem, pisem, pisem.', 'Deda Mraz');
select * from posts;