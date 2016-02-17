drop database programCoordinatorModule;
create database programCoordinatorModule;
use programCoordinatorModule;

/* CREATING TABLES*/

create table program (
    program_id int auto_increment,
	program_code varchar(20),
	program_name varchar(30),
    program_units int,
    program_desc varchar(910),
    primary key (program_id)
);

create table curriculum(
	curriculum_id int auto_increment,
	program_id int,
	curriculum_year int,
	primary key (curriculum_id),
	foreign key (program_id) references program(program_id)
);

create table curriculum_year(
	curriculum_year_id int auto_increment,
	curriculum_id int,
	curriculum_year_year int,
	primary key (curriculum_year_id),
	foreign key (curriculum_id) references curriculum(curriculum_id)
);

create table semester (
	semester_id int auto_increment,
	curriculum_year_id int,
	semester_type int,
	primary key (semester_id),
	foreign key (curriculum_year_id) references curriculum_year(curriculum_year_id)
);

create table course (
    course_id int auto_increment,
	course_code varchar(20),
	course_name varchar(100),
    credit_units int,
	course_description varchar(1000),
	primary key (course_id)
);

create table prerequisite (
	course_id int,
	course_id_pre int,
	foreign key (course_id) references course(course_id),
	foreign key (course_id_pre) references course(course_id)
);

create table semester_subjects(
	semester_id int,
	course_id int,
	foreign key (semester_id) references semester(semester_id),
	foreign key (course_id) references course(course_id)
);


/* INSERTING FIXED VALUES */

insert into program values(null, 'BSIT', 'BS in Information Technology', 'Bachelor of Science in Information Technology (BSIT) is the study of utilization of computers and computer software to plan, install, customize, operate, manage, administer and maintain information technology infrastructure. The BSIT program prepares students to be IT professionals, be well versed on application installation, operation, development, maintenance and administration, and familiar with hardware installation, operation and maintenance. After satisfactorily completing all the requirements leading to a BSIT degree, students may qualify for but not limited to the following entry level positions: Applications Developer, Database Administrator, Entrepreneur in IT Industry, Information Security Administrator, Information Technology Instructor, Network Administrator, Network Engineer, Systems Analyst, Technical Support Specialist, Test Engineer, Web Administrator/Web Master and Web Developer.');

insert into program values(null, 'BSIS', 'BS in Information Systems', 'Bachelor of Science in Information Systems (BSIS) is the study of design and implementation of solutions that integrate information technology with business processes. The BSIS program prepares students to be IT professionals and be expert on design and implementation of IS for business processes. After satisfactorily completing all the requirements leading to a BSIS degree, students may qualify for but not limited to the following entry level positions: Business Process Analyst, Data Quality Specialist, Entrepreneur in IT industry, IS Instructor, Systems Auditor, Quality Assurance Analyst, Systems Implementation Officer, and Technical Support Specialist.');

insert into program values(null, 'BSCS', 'BS in Computer Science', 'Bachelor of Science in Computer Science (BSCS) is the study of concepts and theories, algorithmic foundations, implementation and application of information and computing solutions. The BSCS program prepares students to be IT professionals and researchers who are proficient in designing and developing computing solutions. After satisfactorily completing all the requirements leading to a BSCS degree, students may qualify for but not limited to the following entry level positions: Applications Developer, Computer Science Instructor, Database Programmer/Designer, Information Security Engineer, Quality Assurance Engineer, Researcher, Systems Developer, and Systems Analyst.');