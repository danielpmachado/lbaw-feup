-- Tables

CREATE TABLE brand (
    id SERIAL,
    name text NOT NULL
);

CREATE TABLE favorite (
    id_user integer,
    id_product integer,
    addition_date integer NOT NULL
);


CREATE TABLE model (
    id SERIAL,
    name text,
    id_brand integer
);

CREATE TABLE "order" (
    status text NOT NULL,
    address text NOT NULL,
    contact text NOT NULL,
    total_cost real,
    payment_method text NOT NULL,
    id_user integer,
    id SERIAL,
    delivery_date timestamp with time zone,
    payment_date timestamp with time zone NOT NULL,
    CONSTRAINT total_cost_positive CHECK ((total_cost > 0))
);

CREATE TABLE payment (
    id SERIAL,
    method text,
    amount real,
    date timestamp with time zone
);

CREATE TABLE product (
    id SERIAL,
    name text NOT NULL,
    description text NOT NULL,
    stock integer,
    price real,
    model_id integer,
    CONSTRAINT stock_positive CHECK ((stock >= 0)),
    CONSTRAINT price_positive CHECK ((price > 0))
);


CREATE TABLE product_category (
    id SERIAL,
    name text NOT NULL
);


CREATE TABLE product_order (
    id_product integer,
    id_order integer
);


CREATE TABLE review (
    id SERIAL,
    score real,
    comment text NOT NULL,
    date timestamp with time zone NOT NULL,
    id_product integer,
    id_user integer
);


CREATE TABLE single_category (
    id_product integer,
    id_product_category integer
);


CREATE TABLE "user" (
    id SERIAL,
    email text NOT NULL,
    name text NOT NULL,
    password text NOT NULL,
    address text,
    city text,
    permissions text NOT NULL
);


CREATE TABLE history_product (
    id SERIAL,
    date date NOT NULL,
    description text NOT NULL,
    price real NOT NULL
);


CREATE TABLE single_history_product (
    id_history_product integer,
    id_product integer
);

CREATE TABLE featured_product (
    id SERIAL,
    date date
);

CREATE TABLE single_featured_product (
    id_product integer,
    id_featured_product integer
);

-- Primary Keys and Uniques

ALTER TABLE ONLY brand
    ADD CONSTRAINT brand_pkey PRIMARY KEY (id);

ALTER TABLE ONLY brand
    ADD CONSTRAINT brand_name UNIQUE (name);

ALTER TABLE ONLY favorite
    ADD CONSTRAINT favorite_pkey PRIMARY KEY (id_user, id_product);

ALTER TABLE ONLY model
    ADD CONSTRAINT model_pkey PRIMARY KEY (id);

ALTER TABLE ONLY model
    ADD CONSTRAINT model_name UNIQUE (name);

ALTER TABLE ONLY order
    ADD CONSTRAINT order_pkey PRIMARY KEY (id);

ALTER TABLE ONLY payment
    ADD CONSTRAINT payment_pkey PRIMARY KEY (id, id_order);

ALTER TABLE ONLY product
    ADD CONSTRAINT product_pkey PRIMARY KEY (id);

ALTER TABLE ONLY product
    ADD CONSTRAINT product_name UNIQUE (name);

ALTER TABLE ONLY product_category
    ADD CONSTRAINT product_category_pkey PRIMARY KEY (id);

ALTER TABLE ONLY product_order
    ADD CONSTRAINT product_order_pkey PRIMARY KEY (id_product,id_order);

ALTER TABLE ONLY review
    ADD CONSTRAINT review_pkey PRIMARY KEY (id);

ALTER TABLE ONLY single_category
    ADD CONSTRAINT single_category_pkey PRIMARY KEY (id_product, id_product_category);

ALTER TABLE ONLY user
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);

ALTER TABLE ONLY user
    ADD CONSTRAINT user_email_key UNIQUE (email);


    -- Foreign Keys

ALTER TABLE ONLY favorite
    ADD CONSTRAINT favorite_id_user_fkey FOREIGN KEY (id_user) REFERENCES user(id) ON UPDATE CASCADE;

ALTER TABLE ONLY favorite
    ADD CONSTRAINT favorite_id_product_fkey FOREIGN KEY (id_product) REFERENCES product(id) ON UPDATE CASCADE;

ALTER TABLE ONLY model
    ADD CONSTRAINT model_id_brand_fkey FOREIGN KEY (id_brand) REFERENCES brand(id) ON UPDATE CASCADE;

ALTER TABLE ONLY order
    ADD CONSTRAINT order_id_user_fkey FOREIGN KEY (id_user) REFERENCES user(id) ON UPDATE CASCADE;

ALTER TABLE ONLY payment
    ADD CONSTRAINT payment_id_order_fkey FOREIGN KEY (id_order) REFERENCES order(id) ON UPDATE CASCADE;

ALTER TABLE ONLY product
    ADD CONSTRAINT product_id_model_fkey FOREIGN KEY (id_model) REFERENCES model(id) ON UPDATE CASCADE;

ALTER TABLE ONLY product_order
    ADD CONSTRAINT product_order_id_product_fkey FOREIGN KEY (id_product) REFERENCES product(id) ON UPDATE CASCADE;

ALTER TABLE ONLY product_order
    ADD CONSTRAINT product_order_id_order_fkey FOREIGN KEY (id_order) REFERENCES order(id) ON UPDATE CASCADE;

ALTER TABLE ONLY review
    ADD CONSTRAINT review_id_user_fkey FOREIGN KEY (id_user) REFERENCES user(id) ON UPDATE CASCADE;

ALTER TABLE ONLY review
    ADD CONSTRAINT review_id_product_fkey FOREIGN KEY (id_product) REFERENCES product(id) ON UPDATE CASCADE;

ALTER TABLE ONLY single_category
    ADD CONSTRAINT single_category_id_product_fkey FOREIGN KEY (id_product) REFERENCES product(id) ON UPDATE CASCADE;

ALTER TABLE ONLY single_category
    ADD CONSTRAINT single_category_id_product_category_fkey FOREIGN KEY (id_product_category) REFERENCES product_category(id) ON UPDATE CASCADE;

ALTER TABLE ONLY single_history_product
    ADD CONSTRAINT single_history_product_id_history_product_fkey FOREIGN KEY (id_history_product) REFERENCES history_product(id) ON UPDATE CASCADE;

ALTER TABLE ONLY single_history_product
    ADD CONSTRAINT single_history_product_id_product_fkey FOREIGN KEY (id_product) REFERENCES product(id) ON UPDATE CASCADE;

ALTER TABLE ONLY single_featured_product
    ADD CONSTRAINT single_featured_product_id_product_fkey FOREIGN KEY (id_product) REFERENCES product(id) ON UPDATE CASCADE;

ALTER TABLE ONLY single_featured_product
    ADD CONSTRAINT single_featured_product_id__featured_product_fkey FOREIGN KEY (id_featured_product) REFERENCES featured_product(id) ON UPDATE CASCADE;
