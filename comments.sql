use blog;

create table comments (
    Id int AUTO_INCREMENT,
    Author varchar(50),
    Text varchar(500),
    Post_id int,
    PRIMARY KEY (Id),
    FOREIGN KEY (Post_id) REFERENCES posts(ID)
    );