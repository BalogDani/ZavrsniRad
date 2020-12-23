use blog;

create table comments (
    Id int AUTO_INCREMENT,
    Author varchar(50),
    Text varchar(500),
    Post_id int,
    PRIMARY KEY (Id),
    FOREIGN KEY (Post_id) REFERENCES posts(ID)
    );
    

INSERT INTO `comments` (`Author`, `Text`, `Post_id`)
 VALUES ('Dunja', 'Wow! Kakav blog', 3);
INSERT INTO `comments` (`Author`, `Text`, `Post_id`)
 VALUES ('Dunja', 'Ne slazem sa tobom!', 2);
INSERT INTO `comments` (`Author`, `Text`, `Post_id`)
 VALUES ('Vanja', 'Wow! Ne mogu da verujem', 3);
INSERT INTO `comments` (`Author`, `Text`, `Post_id`)
 VALUES ('Vanja', 'Wow! Kakav blog', 1);
INSERT INTO `comments` (`Author`, `Text`, `Post_id`)
 VALUES ('Milos', 'Kao da bi Marija pisala', 2);
INSERT INTO `comments` (`Author`, `Text`, `Post_id`)
 VALUES ('Milos', 'LOL! XD', 4);
INSERT INTO `comments` (`Author`, `Text`, `Post_id`)
 VALUES ('Dunja', 'No koment...', 4);
INSERT INTO `comments` (`Author`, `Text`, `Post_id`)
 VALUES ('Vanja', 'Wow! Kakav blog', 4);

select * from comments order by Post_id;