## DB basic IDEA

0. Table `config`
 - conf_id primary key int
 - conf_name text/varchar
 - conf_value boolean 
 - conf_mod_date datetime

1. Table `users`
 - id primary key int
 - username text/varchar
 - password text/varchar
 - role int 
    - 0 - Admin
    - 1 - Principal
    - 2 - Teacher
    - 3 - Student
    - 4 - Parent
 - name text/varchar
 - surname text/varchar
 - birth_date datetime

 2. Table `classes`
  - class_id primary key int
  - class_num - text/varchar
  - class_teacher - foreign key (users) int
  - class_students - text/varchar (JSON with user_id in it)
  - class_timetable - foreing key int

3. Table `grades`
  - grade_id primary key int
  - grade_value text/varchar
  - grade_student foreing key (users) int
  - grade_teacher foreing key (users) int 

4. Table `attendance`
  - attendance_id primary key int
  - att_student foreign key (users) int
  - att_type int
   - `0` - absent
   - `1` - present
   - `2` - excused absence
   - `3` - late
   - `4` - dissmised
  - att_date datetime
  - att_lesson int - As it means lesson's number

5. Table `messages`
 - mess_id primary key int
 - mess_title text/varchar
 - mess_text text/varchar
 - mess_sender foreign key (users) int
 - mess_reciever foreign key (users) int
 - mess_sent datetime

6. Table `announcments` 
 - ann_id primary key int
 - ann_title text/varchar
 - ann_text text/varchar
 - ann_sender foreing key (users) int
 - ann_created datetime


TODO: Timetable, Homeworks, Tests