
CREATE TABLE tbl_sync_instance (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    task_id INTEGER NOT NULL,
    is_cur_period BOOL DEFAULT TRUE,
    status TINYINT DEFAULT 0,
    sync_date date NOT NULL,
    start_time datetime NOT NULL,
    end_time datetime DEFAULT '0000-00-00 00:00:00',
    directory VARCHAR(64) DEFAULT 'not set yet',
    job_name VARCHAR(64) DEFAULT 'not set yet',
    job_id VARCHAR(64) DEFAULT 'not set yet',
    data_check_status TINYINT DEFAULT 0,
    src_file_num INTEGER UNSIGNED DEFAULT 0,
    dst_file_num INTEGER UNSIGNED DEFAULT 0,
    src_file_size BIGINT UNSIGNED DEFAULT 0,
    dst_file_size BIGINT UNSIGNED DEFAULT 0,
    src_line_num BIGINT UNSIGNED DEFAULT 0,
    dst_line_num BIGINT UNSIGNED DEFAULT 0,
    exception_info text,
    log_link VARCHAR(128) DEFAULT 'not set yet',
    exec_command VARCHAR(128) DEFAULT 'not set yet',
    waited_times SMALLINT DEFAULT 0,
    retried_times SMALLINT DEFAULT 0
);

INSERT INTO tbl_sync_instance (task_id, sync_date, start_time) VALUES (1, '2013-01-01', '2013-08-01 01:00:00');

CREATE TABLE tbl_user (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    email VARCHAR(128) NOT NULL
);

INSERT INTO tbl_user (username, password, email) VALUES ('test1', 'pass1', 'test1@example.com');
