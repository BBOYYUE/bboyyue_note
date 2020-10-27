# SQL 的一些小技巧

### 数据类型
```
char
varchar
tinytext
text

int
tinyint
bigint

date
time
year
datatime
timestamp
```

### 约束类型
```
primary_key  主键约束

not null 

check

default 

unique 唯一约束

foreign key 外键约束
```

### 索引类型
```
primary index 主键索引 

unique  index 唯一索引

index 普通索引

fulltext index 全文索引
```

### 其他

```
auto_ increment 自动增长

engine  引擎类型

default charset 默认字符集

comment 备注信息

constraint 约束,后面可以跟约束名和约束类型

```
### 数据库维护相关
```
show variables like 'character%'; 查看当前会话使用的字符集

show databases;

show create database database_name;

use database_name;

drop database database_name;

show engines; 查看mysql支持的数据引擎

show tables;

show variables like 'time_ zone'; 显示服务器的时区

describe table_name | desc table_name; 显示表详细信息

show create table table_ name; 显示表结构

show global variables; 查看全局变量信息

show session variables; 查看会话变量信息

flush tables with read lock; 锁定所有的表

unlock tables; 解锁

show index from table_name ; 展示索引

show variables like 'ft_ stopword_ file'; 展示保留字

```

### 数据表结构管理

```
create table table_name ( field_name varchar(255) bigint primary_key auto_ increment);

alter table table_name drop field_name; 删除表字段

alter table table_name drop index index; 删除主键

alter table table_name add field_name char(20) not null after field_name_2; 新增字段

alter table table_name change old_field_name new_field_name varchar(20); 修改字段类型

alter table table_name modify varchar(20); 修改字段类型

alter table table_name add constraint filed_name_unique unique (filed_name);

alter table person engine= MyISAM;

alter table person default charset= gb2312; 

alter table person auto_ increment= 8;

alter table person pack_ keys= 1;

rename table old_table_name to new_table_name;

create index field_name_index on course (field_name(20)); 添加索引

alter table table_name add index field_name_index (field_name(20)) 添加索引

drop index field_name_index on table_name; 删除索引 

create table new_table_name like table; 快速创建一个和原表结构相同的表

```

### 表数据操作

```
insert into table_name (filed_name) values (value) ; 

insert into table_name filed_name select filed_name_2 from table_name_2 ; filed_name  和 filed_name_2 的列数一定要相同. 

replace into table_name (filed_name) values (value) ; replace 和 insert 类似 ,区别在于新纪录如果主键或者唯一字段和一条旧相同, 那么旧纪录会被删除, 然后在执行新纪录的插入操作. 

update table_name set field_name = value where 1 = 1;

delete from table_name where 1=1;

truncate table table_name ; 清空一个表, 父表总是不能被清空, 清空表会重置自增字段
```

### 表数据查询

```
select distinct filed_name from table_name where filed_name = value group by filed_name_2 having filed_name_2 > 2 order by filed_name_2 > 1 limit start length;

select a.filed_name,b.filed_name from table_name_1 as a left join table_name_2  as b on a.id = b.id where a.id > 1;

select a.filed_name,b.filed_name from table_name_1 as a inner join table_name_2 as b on a.id = b.id where a.name is null; null 不能用等于来进行判断. 

select sum(number) from table_name group by filed_name having filed_name > 0 with rollup; with rollup 会在最后加一个合计

select group_concat(filed_name) from table_name group by filed_name_2; group_concat 会把指定的列的字段用逗号连接起来. 

select field_name_1 from table_name_1 union select field_name_2 from table_name_2 ;field_name_1 和 field_name_2 的字段类型和字段个数必须相同

select field_name_1 from table_name_1 union all select field_name_2 from table_name_2; 联合查询 union all 包含重复的值 , union 不包含.

select field_name_1 from table_name_1 where field_name_1 in (select field_name_2 from table_name_2); 子查询 括号中的查询和括号外没有关系, 称为不相关子查询. 不查询子查询, 括号中的代码只执行一次.

select field_name_1 from table_name_1 where field_name_1 exists (select field_name_2 from table_name_2 where field_name_1 = field_name_2); 如果括号中存在结果. 就执行括号外的SQL. 括号内的查询使用了括号外的字段, 相关子查询. 

select field_name_2 from table_name_1 where field_name_1 > any (select field_name_2 from table_name_2); 相当于大于 field_name_2 的最小值

select field_name_2 from table_name_2 where field_name_2 > all (select field_name_2 from table_name_2); 相当于大于 field_name_2 的最大值

select field_name_1 from table_name where match (filed_name_1 ,filed_name_2) against ('whosyourdaddy'); 全文检索 查询结果按关联度进行排序, 如果查询的结果中,权重超过 50% 的值会被忽略, 权重越低的值越容易被查出来,



```
### 常用函数

now() 当前时间 

sum() 求和

max() 最大值

min() 最小值

avg() 平均数

group_concat()

