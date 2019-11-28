create table admin
(
    admin_id       int auto_increment
        primary key,
    admin_name     varchar(255) not null,
    admin_password varchar(11)  not null
);

create table course
(
    course_id   int(100) auto_increment
        primary key,
    course_name varchar(255) not null
);

create table lecturer
(
    lecturer_id       int(100) auto_increment
        primary key,
    lecturer_name     varchar(255) not null,
    lecturer_staff_no varchar(255) not null,
    lecturer_password varchar(255) not null
);

create table student
(
    student_id       int(100) auto_increment
        primary key,
    student_name     varchar(255) not null,
    student_password varchar(255) not null,
    student_course   int(100)     not null,
    student_reg_no   varchar(255) not null,
    constraint student_course_fk
        foreign key (student_course) references course (course_id)
            on delete cascade
);

create table unit
(
    unit_id       int(100) auto_increment
        primary key,
    unit_name     varchar(255) not null,
    unit_course   int(100)     not null,
    unit_lecturer int(100)     not null,
    constraint unit_course_fk
        foreign key (unit_course) references course (course_id)
            on delete cascade,
    constraint unit_lecture_fk
        foreign key (unit_lecturer) references lecturer (lecturer_id)
            on delete cascade
);

create table lec_assignment
(
    assignment_id            int(100) auto_increment
        primary key,
    assignment_uni           int(100)                            not null,
    assignment_date_due      timestamp                           not null,
    assignment_date_uploaded timestamp default CURRENT_TIMESTAMP not null,
    file                     varchar(255)                        null,
    constraint assignment_unit_fk
        foreign key (assignment_uni) references unit (unit_id)
            on delete cascade
);

create table notes
(
    notes_id            int(100) auto_increment
        primary key,
    notes_unit          int(100)                            not null,
    notes_date_uploaded timestamp default CURRENT_TIMESTAMP not null,
    file                varchar(255)                        null,
    constraint notes_id
        foreign key (notes_unit) references unit (unit_id)
            on delete cascade
);

create table student_assignment
(
    student_assignment_id         int auto_increment
        primary key,
    student_assignment_student    int                                 not null,
    student_assignment_assignment int                                 not null,
    file                          varchar(255)                        null,
    date_uploaded                 timestamp default CURRENT_TIMESTAMP not null,
    constraint student_assignment_assignment_fk
        foreign key (student_assignment_assignment) references lec_assignment (assignment_id)
            on delete cascade,
    constraint student_assignment_student_fk
        foreign key (student_assignment_student) references student (student_id)
            on delete cascade
);


