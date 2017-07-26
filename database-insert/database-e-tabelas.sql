/*
    Caso queira seguir as aulas com os exatos mesmos dados, depois
    de já ter colocado o projeto Arte em Dois no local correto
    de seu servidor localhost, prossiga com as dicas a seguir:

    1 - Não inicie a instalação fácil de cinco minutos do WordPress,
    onde você configuraria um banco de dados;

    2 - No arquivo wp-config.php, que está presente na raíz do projeto
    /arte-em-dois, atualize o DB_USER, o DB_PASSWORD e o DB_HOST caso
    a sua configuração de banco de dados local seja diferente;

    3 - Rode este arquivo, /database-insert/database-e-tabelas.sql,
    em seu banco de dados local para poder criar o banco de dados
    e as tabelas;

    4 - Com o banco de dados arte_em_dois selecionado, rode todos os
    outros arquivos SQL presentes em /database-insert para preencher
    as tabelas criadas;

    5 - Acesse http://[seu_endereco_localhost]/[seu_path]/arte-em-dois/wp-admin/
    e entre com:
        - Login: adminwp@gmail.com
        - Senha: 123456789

    Assim o processo para ter um projeto como o artigo inicial da série
    terá sido finalizado. Você terá de iniciar alguns plugins com o seu
    próprio email, pode altera-lo assim que necessário em "Usuários".
*/


CREATE DATABASE arte_em_dois;
USE arte_em_dois;

CREATE TABLE ad_commentmeta
(
    meta_id BIGINT(20) UNSIGNED PRIMARY KEY NOT NULL,
    comment_id BIGINT(20) UNSIGNED DEFAULT '0' NOT NULL,
    meta_key VARCHAR(255),
    meta_value LONGTEXT
);
CREATE INDEX comment_id ON ad_commentmeta (comment_id);
CREATE INDEX meta_key ON ad_commentmeta (meta_key);
CREATE TABLE ad_comments
(
    comment_ID BIGINT(20) UNSIGNED PRIMARY KEY NOT NULL,
    comment_post_ID BIGINT(20) UNSIGNED DEFAULT '0' NOT NULL,
    comment_author TINYTEXT NOT NULL,
    comment_author_email VARCHAR(100) DEFAULT '' NOT NULL,
    comment_author_url VARCHAR(200) DEFAULT '' NOT NULL,
    comment_author_IP VARCHAR(100) DEFAULT '' NOT NULL,
    comment_date DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
    comment_date_gmt DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
    comment_content TEXT NOT NULL,
    comment_karma INT(11) DEFAULT '0' NOT NULL,
    comment_approved VARCHAR(20) DEFAULT '1' NOT NULL,
    comment_agent VARCHAR(255) DEFAULT '' NOT NULL,
    comment_type VARCHAR(20) DEFAULT '' NOT NULL,
    comment_parent BIGINT(20) UNSIGNED DEFAULT '0' NOT NULL,
    user_id BIGINT(20) UNSIGNED DEFAULT '0' NOT NULL
);
CREATE INDEX comment_approved_date_gmt ON ad_comments (comment_approved, comment_date_gmt);
CREATE INDEX comment_author_email ON ad_comments (comment_author_email);
CREATE INDEX comment_date_gmt ON ad_comments (comment_date_gmt);
CREATE INDEX comment_parent ON ad_comments (comment_parent);
CREATE INDEX comment_post_ID ON ad_comments (comment_post_ID);
CREATE TABLE ad_links
(
    link_id BIGINT(20) UNSIGNED PRIMARY KEY NOT NULL,
    link_url VARCHAR(255) DEFAULT '' NOT NULL,
    link_name VARCHAR(255) DEFAULT '' NOT NULL,
    link_image VARCHAR(255) DEFAULT '' NOT NULL,
    link_target VARCHAR(25) DEFAULT '' NOT NULL,
    link_description VARCHAR(255) DEFAULT '' NOT NULL,
    link_visible VARCHAR(20) DEFAULT 'Y' NOT NULL,
    link_owner BIGINT(20) UNSIGNED DEFAULT '1' NOT NULL,
    link_rating INT(11) DEFAULT '0' NOT NULL,
    link_updated DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
    link_rel VARCHAR(255) DEFAULT '' NOT NULL,
    link_notes MEDIUMTEXT NOT NULL,
    link_rss VARCHAR(255) DEFAULT '' NOT NULL
);
CREATE INDEX link_visible ON ad_links (link_visible);
CREATE TABLE ad_options
(
    option_id BIGINT(20) UNSIGNED PRIMARY KEY NOT NULL,
    option_name VARCHAR(191) DEFAULT '' NOT NULL,
    option_value LONGTEXT NOT NULL,
    autoload VARCHAR(20) DEFAULT 'yes' NOT NULL
);
CREATE UNIQUE INDEX option_name ON ad_options (option_name);
CREATE TABLE ad_postmeta
(
    meta_id BIGINT(20) UNSIGNED PRIMARY KEY NOT NULL,
    post_id BIGINT(20) UNSIGNED DEFAULT '0' NOT NULL,
    meta_key VARCHAR(255),
    meta_value LONGTEXT
);
CREATE INDEX meta_key ON ad_postmeta (meta_key);
CREATE INDEX post_id ON ad_postmeta (post_id);
CREATE TABLE ad_posts
(
    ID BIGINT(20) UNSIGNED PRIMARY KEY NOT NULL,
    post_author BIGINT(20) UNSIGNED DEFAULT '0' NOT NULL,
    post_date DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
    post_date_gmt DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
    post_content LONGTEXT NOT NULL,
    post_title TEXT NOT NULL,
    post_excerpt TEXT NOT NULL,
    post_status VARCHAR(20) DEFAULT 'publish' NOT NULL,
    comment_status VARCHAR(20) DEFAULT 'open' NOT NULL,
    ping_status VARCHAR(20) DEFAULT 'open' NOT NULL,
    post_password VARCHAR(255) DEFAULT '' NOT NULL,
    post_name VARCHAR(200) DEFAULT '' NOT NULL,
    to_ping TEXT NOT NULL,
    pinged TEXT NOT NULL,
    post_modified DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
    post_modified_gmt DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
    post_content_filtered LONGTEXT NOT NULL,
    post_parent BIGINT(20) UNSIGNED DEFAULT '0' NOT NULL,
    guid VARCHAR(255) DEFAULT '' NOT NULL,
    menu_order INT(11) DEFAULT '0' NOT NULL,
    post_type VARCHAR(20) DEFAULT 'post' NOT NULL,
    post_mime_type VARCHAR(100) DEFAULT '' NOT NULL,
    comment_count BIGINT(20) DEFAULT '0' NOT NULL
);
CREATE INDEX post_author ON ad_posts (post_author);
CREATE INDEX post_name ON ad_posts (post_name);
CREATE INDEX post_parent ON ad_posts (post_parent);
CREATE INDEX type_status_date ON ad_posts (post_type, post_status, post_date, ID);
CREATE TABLE ad_stb_styles
(
    slug VARCHAR(55) PRIMARY KEY NOT NULL,
    caption VARCHAR(255) NOT NULL,
    js_style TEXT,
    css_style TEXT,
    stype VARCHAR(8),
    trash TINYINT(1) DEFAULT '0'
);
CREATE TABLE ad_term_relationships
(
    object_id BIGINT(20) UNSIGNED DEFAULT '0' NOT NULL,
    term_taxonomy_id BIGINT(20) UNSIGNED DEFAULT '0' NOT NULL,
    term_order INT(11) DEFAULT '0' NOT NULL,
    CONSTRAINT `PRIMARY` PRIMARY KEY (object_id, term_taxonomy_id)
);
CREATE INDEX term_taxonomy_id ON ad_term_relationships (term_taxonomy_id);
CREATE TABLE ad_term_taxonomy
(
    term_taxonomy_id BIGINT(20) UNSIGNED PRIMARY KEY NOT NULL,
    term_id BIGINT(20) UNSIGNED DEFAULT '0' NOT NULL,
    taxonomy VARCHAR(32) DEFAULT '' NOT NULL,
    description LONGTEXT NOT NULL,
    parent BIGINT(20) UNSIGNED DEFAULT '0' NOT NULL,
    count BIGINT(20) DEFAULT '0' NOT NULL
);
CREATE INDEX taxonomy ON ad_term_taxonomy (taxonomy);
CREATE UNIQUE INDEX term_id_taxonomy ON ad_term_taxonomy (term_id, taxonomy);
CREATE TABLE ad_termmeta
(
    meta_id BIGINT(20) UNSIGNED PRIMARY KEY NOT NULL,
    term_id BIGINT(20) UNSIGNED DEFAULT '0' NOT NULL,
    meta_key VARCHAR(255),
    meta_value LONGTEXT
);
CREATE INDEX meta_key ON ad_termmeta (meta_key);
CREATE INDEX term_id ON ad_termmeta (term_id);
CREATE TABLE ad_terms
(
    term_id BIGINT(20) UNSIGNED PRIMARY KEY NOT NULL,
    name VARCHAR(200) DEFAULT '' NOT NULL,
    slug VARCHAR(200) DEFAULT '' NOT NULL,
    term_group BIGINT(10) DEFAULT '0' NOT NULL
);
CREATE INDEX name ON ad_terms (name);
CREATE INDEX slug ON ad_terms (slug);
CREATE TABLE ad_usermeta
(
    umeta_id BIGINT(20) UNSIGNED PRIMARY KEY NOT NULL,
    user_id BIGINT(20) UNSIGNED DEFAULT '0' NOT NULL,
    meta_key VARCHAR(255),
    meta_value LONGTEXT
);
CREATE INDEX meta_key ON ad_usermeta (meta_key);
CREATE INDEX user_id ON ad_usermeta (user_id);
CREATE TABLE ad_users
(
    ID BIGINT(20) UNSIGNED PRIMARY KEY NOT NULL,
    user_login VARCHAR(60) DEFAULT '' NOT NULL,
    user_pass VARCHAR(255) DEFAULT '' NOT NULL,
    user_nicename VARCHAR(50) DEFAULT '' NOT NULL,
    user_email VARCHAR(100) DEFAULT '' NOT NULL,
    user_url VARCHAR(100) DEFAULT '' NOT NULL,
    user_registered DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
    user_activation_key VARCHAR(255) DEFAULT '' NOT NULL,
    user_status INT(11) DEFAULT '0' NOT NULL,
    display_name VARCHAR(250) DEFAULT '' NOT NULL
);
CREATE INDEX user_email ON ad_users (user_email);
CREATE INDEX user_login_key ON ad_users (user_login);
CREATE INDEX user_nicename ON ad_users (user_nicename);
CREATE TABLE ad_yikes_easy_mc_forms
(
    id INT(11) NOT NULL,
    list_id TEXT NOT NULL,
    form_name TEXT NOT NULL,
    form_description TEXT NOT NULL,
    fields TEXT NOT NULL,
    custom_styles TEXT NOT NULL,
    custom_template TEXT NOT NULL,
    send_welcome_email INT(11) NOT NULL,
    redirect_user_on_submit INT(11) NOT NULL,
    redirect_page TEXT NOT NULL,
    submission_settings TEXT NOT NULL,
    optin_settings TEXT NOT NULL,
    form_settings TEXT NOT NULL,
    error_messages TEXT NOT NULL,
    custom_notifications TEXT NOT NULL,
    impressions INT(11) NOT NULL,
    submissions INT(11) NOT NULL,
    custom_fields TEXT NOT NULL
);
CREATE UNIQUE INDEX id ON ad_yikes_easy_mc_forms (id);