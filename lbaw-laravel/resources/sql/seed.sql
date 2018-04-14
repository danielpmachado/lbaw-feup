-- Tables
DROP TABLE IF EXISTS brand CASCADE;
DROP TABLE IF EXISTS favorite CASCADE;
DROP TABLE IF EXISTS model CASCADE;
DROP TABLE IF EXISTS "order" CASCADE;
DROP TABLE IF EXISTS payment CASCADE;
DROP TABLE IF EXISTS product CASCADE;
DROP TABLE IF EXISTS "user" CASCADE;
DROP TABLE IF EXISTS history_product CASCADE;
DROP TABLE IF EXISTS product_category CASCADE;
DROP TABLE IF EXISTS single_category CASCADE;
DROP TABLE IF EXISTS product_order CASCADE;
DROP TABLE IF EXISTS featured_product CASCADE;
DROP TABLE IF EXISTS review CASCADE;
DROP TABLE IF EXISTS single_history_product CASCADE;
DROP TABLE IF EXISTS single_featured_product CASCADE;

CREATE TABLE brand (
    id SERIAL,
    name text NOT NULL
);

CREATE TABLE favorite (
    id_user integer,
    id_product integer,
    addition_date timestamp with time zone
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
    id_order integer,
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
    id_model integer,
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

ALTER TABLE ONLY "order"
    ADD CONSTRAINT order_pkey PRIMARY KEY (id);

ALTER TABLE ONLY payment
    ADD CONSTRAINT payment_pkey PRIMARY KEY (id);

ALTER TABLE ONLY product
    ADD CONSTRAINT product_pkey PRIMARY KEY (id);

ALTER TABLE ONLY product
    ADD CONSTRAINT product_name UNIQUE (name);

ALTER TABLE ONLY history_product
ADD CONSTRAINT  history_product_pkey PRIMARY KEY (id);

ALTER TABLE ONLY product_category
    ADD CONSTRAINT product_category_pkey PRIMARY KEY (id);

ALTER TABLE ONLY featured_product
    ADD CONSTRAINT featured_product_pkey PRIMARY KEY (id);

ALTER TABLE ONLY product_order
    ADD CONSTRAINT product_order_pkey PRIMARY KEY (id_product,id_order);

ALTER TABLE ONLY review
    ADD CONSTRAINT review_pkey PRIMARY KEY (id);

ALTER TABLE ONLY single_category
    ADD CONSTRAINT single_category_pkey PRIMARY KEY (id_product, id_product_category);

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_email_key UNIQUE (email);

ALTER TABLE ONLY single_featured_product
    ADD CONSTRAINT single_featured_product_pkey PRIMARY KEY (id_product, id_featured_product);


    -- Foreign Keys

ALTER TABLE ONLY favorite
    ADD CONSTRAINT favorite_id_user_fkey FOREIGN KEY (id_user) REFERENCES "user"(id) ON UPDATE CASCADE;

ALTER TABLE ONLY favorite
    ADD CONSTRAINT favorite_id_product_fkey FOREIGN KEY (id_product) REFERENCES product(id) ON UPDATE CASCADE;

ALTER TABLE ONLY model
    ADD CONSTRAINT model_id_brand_fkey FOREIGN KEY (id_brand) REFERENCES brand(id) ON UPDATE CASCADE;

ALTER TABLE ONLY "order"
    ADD CONSTRAINT order_id_user_fkey FOREIGN KEY (id_user) REFERENCES "user"(id) ON UPDATE CASCADE;

ALTER TABLE ONLY payment
    ADD CONSTRAINT payment_id_order_fkey FOREIGN KEY (id_order) REFERENCES "order"(id) ON UPDATE CASCADE;

ALTER TABLE ONLY product
    ADD CONSTRAINT product_id_model_fkey FOREIGN KEY (id_model) REFERENCES model(id) ON UPDATE CASCADE;

ALTER TABLE ONLY product_order
    ADD CONSTRAINT product_order_id_product_fkey FOREIGN KEY (id_product) REFERENCES product(id) ON UPDATE CASCADE;

ALTER TABLE ONLY product_order
    ADD CONSTRAINT product_order_id_order_fkey FOREIGN KEY (id_order) REFERENCES "order"(id) ON UPDATE CASCADE;

ALTER TABLE ONLY review
    ADD CONSTRAINT review_id_user_fkey FOREIGN KEY (id_user) REFERENCES "user"(id) ON UPDATE CASCADE;

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


INSERT INTO brand (id,name) VALUES (1,'Asus');
INSERT INTO brand (id,name) VALUES (2,'HP');
INSERT INTO brand (id,name) VALUES (3,'Apple');
INSERT INTO brand (id,name) VALUES (4,'Samsung');
INSERT INTO brand (id,name) VALUES (5,'Xiaomi');
INSERT INTO brand (id,name) VALUES (6,'One Plus');
INSERT INTO brand (id,name) VALUES (7,'Huawei');
INSERT INTO brand (id,name) VALUES (8,'Toshiba');
INSERT INTO brand (id,name) VALUES (9,'Lenovo');
INSERT INTO brand (id,name) VALUES (10,'Nokia');
INSERT INTO brand (id,name) VALUES (11,'Acer');
INSERT INTO brand (id,name) VALUES (12,'Dell');
INSERT INTO brand (id,name) VALUES (13,'Microsoft');
INSERT INTO brand (id,name) VALUES (14,'LG');
INSERT INTO brand (id,name) VALUES (15,'Intel');
INSERT INTO brand (id,name) VALUES (16,'AMD');
INSERT INTO brand (id,name) VALUES (17,'MSI');
INSERT INTO brand (id,name) VALUES (18,'Kingston');
INSERT INTO brand (id,name) VALUES (19,'SanDisk');
INSERT INTO brand (id,name) VALUES (20,'NVIDIA');

INSERT INTO model (id,name,id_brand) VALUES (1,'Surface 3',13);
INSERT INTO model (id,name,id_brand) VALUES (2,'SDSDUNC-064G-GN6IN',19);
INSERT INTO model (id,name,id_brand) VALUES (3,'6',10);
INSERT INTO model (id,name,id_brand) VALUES (4,'SDSDUNC-128G-GN6IN',19);
INSERT INTO model (id,name,id_brand) VALUES (5,'GL62M 7RDX-2203XES',17);
INSERT INTO model (id,name,id_brand) VALUES (6,'A6-6400K',16);
INSERT INTO model (id,name,id_brand) VALUES (7,'Lumia 1020',10);
INSERT INTO model (id,name,id_brand) VALUES (8,'Yoga',9);
INSERT INTO model (id,name,id_brand) VALUES (9,'S9+',4);
INSERT INTO model (id,name,id_brand) VALUES (10,'Latitude 5480',12);
INSERT INTO model (id,name,id_brand) VALUES (11,'X',3);
INSERT INTO model (id,name,id_brand) VALUES (12,'Aspire V 13',11);
INSERT INTO model (id,name,id_brand) VALUES (13,'P20',7);
INSERT INTO model (id,name,id_brand) VALUES (14,'GTX1080',20);
INSERT INTO model (id,name,id_brand) VALUES (15,'Mi 6',5);
INSERT INTO model (id,name,id_brand) VALUES (16,'Macbook Pro 15"',3);
INSERT INTO model (id,name,id_brand) VALUES (17,'G6',14);
INSERT INTO model (id,name,id_brand) VALUES (18,'8',3);
INSERT INTO model (id,name,id_brand) VALUES (19,'S8',4);
INSERT INTO model (id,name,id_brand) VALUES (20,'GTX960M',20);


INSERT INTO "user" (id,email,name,password,address,city,permissions) VALUES (DEFAULT,'vel.est.tempor@erat.org','Geoffrey Keith','PDB77ZTR5OS','Ap #894-4328 Erat Road','Raiganj','Admin ');
INSERT INTO "user" (id,email,name,password,address,city,permissions) VALUES (DEFAULT,'egestas@nisl.co.uk','Rama Browning','HSY38MXX8ME','P.O. Box 369, 4403 Massa Avenue','Chapadinha',' User');
INSERT INTO "user" (id,email,name,password,address,city,permissions) VALUES (DEFAULT,'lobortis.quis.pede@Vivamusrhoncus.net','Olivia Brennan','MOX89EFA0DU','Ap #624-5071 At, Ave','Oostakker',' User');
INSERT INTO "user" (id,email,name,password,address,city,permissions) VALUES (DEFAULT,'Nulla.facilisi@semeget.org','Charity Livingston','QYA36FRM1NX','9785 Neque St.','Ambala Sadar','Admin ');
INSERT INTO "user" (id,email,name,password,address,city,permissions) VALUES (DEFAULT,'nisi@Duiscursus.com','Levi Cervantes','XNW95ZQW9TY','Ap #722-1022 Odio St.','Maria',' User');
INSERT INTO "user" (id,email,name,password,address,city,permissions) VALUES (DEFAULT,'egestas@diam.edu','Quinn Barnes','IBH69AXY9UU','Ap #515-4663 Nulla Street','Melsele','Admin ');
INSERT INTO "user" (id,email,name,password,address,city,permissions) VALUES (DEFAULT,'primis@Integervulputaterisus.com','Xenos Osborn','GMT03GML0QV','P.O. Box 893, 1360 Magna. Ave','Fayetteville',' User');
INSERT INTO "user" (id,email,name,password,address,city,permissions) VALUES (DEFAULT,'feugiat@pedeSuspendisse.com','Cole Tyson','ONK78OZF8JP','202-214 Lorem Ave','Montpellier','Admin ');
INSERT INTO "user" (id,email,name,password,address,city,permissions) VALUES (DEFAULT,'elit.dictum.eu@eget.net','Desirae Vazquez','TGT94CGV0GO','P.O. Box 989, 6124 Mi Avenue','Qualicum Beach',' User');
INSERT INTO "user" (id,email,name,password,address,city,permissions) VALUES (DEFAULT,'mus.Aenean@velitinaliquet.edu','Xandra Drake','YUT64SMA0OL','6876 Justo Rd.','Musselburgh',' User');
INSERT INTO "user" (id,email,name,password,address,city,permissions) VALUES (DEFAULT,'nibh.vulputate@est.com','Isaac Dillard','SDJ96YDP4PD','Ap #123-9516 Augue. St.','Ramsel','Admin ');
INSERT INTO "user" (id,email,name,password,address,city,permissions) VALUES (DEFAULT,'fringilla.purus.mauris@anequeNullam.org','Hayes Mcpherson','SJG98OFJ0XY','2765 Mi Rd.','Hawick','Admin ');
INSERT INTO "user" (id,email,name,password,address,city,permissions) VALUES (DEFAULT,'Suspendisse.aliquet.molestie@atvelit.com','Sydney Mcfadden','QQO20CHT9RF','9359 Lorem Av.','Richmond','Admin ');
INSERT INTO "user" (id,email,name,password,address,city,permissions) VALUES (DEFAULT,'risus.Nunc@semutcursus.co.uk','Kaseem Holman','CYZ17ZTS8LO','P.O. Box 464, 9581 Sem Av.','Fort Smith',' User');
INSERT INTO "user" (id,email,name,password,address,city,permissions) VALUES (DEFAULT,'scelerisque.lorem.ipsum@Maurisquisturpis.org','Tatum Simpson','SHD63JUZ3FH','3972 Sit Rd.','Salem','Admin ');
INSERT INTO "user" (id,email,name,password,address,city,permissions) VALUES (DEFAULT,'nostra@ultricesVivamusrhoncus.com','Adara Frazier','VBD69BIR9VV','Ap #667-4458 Mauris Rd.','Recogne',' User');
INSERT INTO "user" (id,email,name,password,address,city,permissions) VALUES (DEFAULT,'semper@penatibusetmagnis.edu','Ciaran Singleton','FBI41SUB4DT','Ap #147-4425 Velit Ave','San Juan de la Costa','Admin ');
INSERT INTO "user" (id,email,name,password,address,city,permissions) VALUES (DEFAULT,'Morbi.metus.Vivamus@faucibusleo.edu','Sloane Hatfield','JPG58FMP5HH','P.O. Box 882, 3276 Nunc Ave','Cañete',' User');
INSERT INTO "user" (id,email,name,password,address,city,permissions) VALUES (DEFAULT,'mollis.nec.cursus@ultrices.edu','Zachary Love','WXF13ZUT7RV','P.O. Box 790, 9016 Vitae Ave','Purnea','Admin ');
INSERT INTO "user" (id,email,name,password,address,city,permissions) VALUES (DEFAULT,'eu@auctor.ca','Tashya Irwin','GBU93BOO1SH','212-7102 Risus. Av.','Águas Lindas de Goiás','Admin ');


INSERT INTO product (id,name,description,stock,price,id_model) VALUES (DEFAULT,'Steel','facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor odio a purus. Duis elementum, dui quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse',9970,950,1);
INSERT INTO product (id,name,description,stock,price,id_model) VALUES (DEFAULT,'Garrison','diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut mi. Duis risus odio, auctor vitae, aliquet nec, imperdiet nec, leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod in, dolor. Fusce feugiat. Lorem ipsum dolor sit amet, consectetuer',1832,530,1);
INSERT INTO product (id,name,description,stock,price,id_model) VALUES (DEFAULT,'Solomon','Mauris ut quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing. Mauris molestie pharetra nibh. Aliquam ornare, libero at auctor ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo eu arcu. Morbi sit amet massa. Quisque porttitor eros nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam. Duis mi enim, condimentum eget, volutpat ornare, facilisis',1436,1211,13);
INSERT INTO product (id,name,description,stock,price,id_model) VALUES (DEFAULT,'Slade','in, cursus et, eros. Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate, nisi sem semper erat, in consectetuer ipsum nunc id enim. Curabitur massa. Vestibulum accumsan neque et',7510,354,12);
INSERT INTO product (id,name,description,stock,price,id_model) VALUES (DEFAULT,'Martin','pede nec ante blandit viverra. Donec tempus, lorem fringilla ornare placerat, orci lacus vestibulum lorem, sit amet ultricies sem magna nec quam. Curabitur vel lectus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est',4946,576,13);
INSERT INTO product (id,name,description,stock,price,id_model) VALUES (DEFAULT,'Nicholas','a neque. Nullam ut nisi a odio semper cursus. Integer mollis. Integer tincidunt aliquam arcu. Aliquam ultrices iaculis odio. Nam interdum enim non nisi. Aenean eget metus. In nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus non, egestas a, dui. Cras pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus',7345,967,2);
INSERT INTO product (id,name,description,stock,price,id_model) VALUES (DEFAULT,'Kenneth','In nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus non, egestas a, dui. Cras pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet,',8989,93,14);
INSERT INTO product (id,name,description,stock,price,id_model) VALUES (DEFAULT,'Isaiah','Curabitur massa. Vestibulum accumsan neque et nunc. Quisque ornare tortor at risus. Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac mattis velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus nibh dolor, nonummy ac, feugiat non, lobortis quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel,',1794,346,3);
INSERT INTO product (id,name,description,stock,price,id_model) VALUES (DEFAULT,'Andrew','et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate, nisi sem semper erat, in consectetuer ipsum nunc id enim. Curabitur massa. Vestibulum accumsan neque et nunc. Quisque ornare tortor at risus. Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac mattis velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere',7575,994,8);
INSERT INTO product (id,name,description,stock,price,id_model) VALUES (DEFAULT,'Thane','in felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis risus. In mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec urna suscipit nonummy.',3392,381,16);
INSERT INTO product (id,name,description,stock,price,id_model) VALUES (DEFAULT,'Palmer','Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per',5549,456,1);
INSERT INTO product (id,name,description,stock,price,id_model) VALUES (DEFAULT,'Keaton','feugiat nec, diam. Duis mi enim, condimentum eget, volutpat ornare, facilisis eget, ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend',7289,885,8);
INSERT INTO product (id,name,description,stock,price,id_model) VALUES (DEFAULT,'Hiram','odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor odio a purus. Duis elementum, dui quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus. Aenean',2127,165,1);
INSERT INTO product (id,name,description,stock,price,id_model) VALUES (DEFAULT,'Calvin','Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce aliquet magna a neque. Nullam ut nisi a odio semper cursus. Integer mollis. Integer tincidunt aliquam arcu. Aliquam ultrices iaculis odio. Nam interdum enim',4332,1168,17);
INSERT INTO product (id,name,description,stock,price,id_model) VALUES (DEFAULT,'Kevin','enim commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus',1004,905,10);
INSERT INTO product (id,name,description,stock,price,id_model) VALUES (DEFAULT,'Zane','neque. Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse',3025,1037,19);
INSERT INTO product (id,name,description,stock,price,id_model) VALUES (DEFAULT,'Alan','in consectetuer ipsum nunc id enim. Curabitur massa. Vestibulum accumsan neque et nunc. Quisque ornare tortor at risus. Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac mattis velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus nibh dolor, nonummy ac, feugiat non, lobortis quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer sem elit, pharetra',4143,496,1);
INSERT INTO product (id,name,description,stock,price,id_model) VALUES (DEFAULT,'Merritt','quam. Curabitur vel lectus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque. Morbi quis urna. Nunc quis',4982,1161,12);
INSERT INTO product (id,name,description,stock,price,id_model) VALUES (DEFAULT,'Quamar','egestas hendrerit neque. In ornare sagittis felis. Donec tempor, est ac mattis semper, dui lectus rutrum urna, nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis placerat. Cras dictum ultricies ligula. Nullam',4509,21,4);
INSERT INTO product (id,name,description,stock,price,id_model) VALUES (DEFAULT,'Hamilton','ut lacus. Nulla tincidunt, neque vitae semper egestas, urna justo faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus',737,134,12);


INSERT INTO favorite (id_user,id_product,addition_date) VALUES (6,8,'2018-04-05');
INSERT INTO favorite (id_user,id_product,addition_date) VALUES (6,9,'2018-04-05');
INSERT INTO favorite (id_user,id_product,addition_date) VALUES (3,8,'2018-04-05');
INSERT INTO favorite (id_user,id_product,addition_date) VALUES (15,6,'2018-04-05');
INSERT INTO favorite (id_user,id_product,addition_date) VALUES (10,2,'2018-04-05');
INSERT INTO favorite (id_user,id_product,addition_date) VALUES (2,4,'2018-04-05');
INSERT INTO favorite (id_user,id_product,addition_date) VALUES (19,6,'2018-04-05');
INSERT INTO favorite (id_user,id_product,addition_date) VALUES (14,8,'2018-04-05');
INSERT INTO favorite (id_user,id_product,addition_date) VALUES (11,8,'2018-04-05');
INSERT INTO favorite (id_user,id_product,addition_date) VALUES (19,4,'2018-04-05');
INSERT INTO favorite (id_user,id_product,addition_date) VALUES (2,7,'2018-04-05');
INSERT INTO favorite (id_user,id_product,addition_date) VALUES (13,8,'2018-04-05');
INSERT INTO favorite (id_user,id_product,addition_date) VALUES (5,7,'2018-04-05');
INSERT INTO favorite (id_user,id_product,addition_date) VALUES (6,4,'2018-04-05');
INSERT INTO favorite (id_user,id_product,addition_date) VALUES (5,10,'2018-04-05');
INSERT INTO favorite (id_user,id_product,addition_date) VALUES (10,7,'2018-04-05');
INSERT INTO favorite (id_user,id_product,addition_date) VALUES (20,6,'2018-04-05');
INSERT INTO favorite (id_user,id_product,addition_date) VALUES (9,7,'2018-04-05');
INSERT INTO favorite (id_user,id_product,addition_date) VALUES (12,8,'2018-04-05');



INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Deliveried','Ap #699-800 Ligula St.','981 553 524',2203,'Credit Card ',11,1,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Processing ','P.O. Box 328, 3629 Luctus Avenue','915 449 883',244,'Credit Card ',17,2,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES ('Wainting for payment ','125-2064 Non Rd.','912 223 293',2606,' Paypal ',5,3,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Deliveried','5728 Duis Rd.','923 049 699',1373,' Paypal ',15,4,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Paid ','406-5972 Est, Ave','997 575 459',133,'Credit Card ',3,5,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Processing ','Ap #739-7587 Enim St.','929 674 574',2177,' Paypal ',14,6,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Dispatched ','141-4427 Nunc St.','921 047 241',568,' Paypal ',19,7,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Paid ','P.O. Box 414, 8721 Fusce Rd.','911 618 718',618,' Paypal ',9,8,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Paid ','825-459 Et Rd.','906 620 148',1932,'Credit Card ',2,9,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Deliveried','Ap #368-237 Dictum Ave','926 665 779',2635,' Paypal ',20,10,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Paid ','P.O. Box 429, 4162 Aliquam Rd.','974 961 497',2413,'Credit Card ',16,11,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Paid ','908-3078 Egestas, Rd.','945 787 498',2913,'Credit Card ',11,12,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Processing ','7485 Sapien Rd.','984 004 124',473,' Paypal ',16,13,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Paid ','Ap #887-8670 Ante, Ave','926 430 684',1589,'Credit Card ',11,14,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Paid ','P.O. Box 309, 2462 A St.','902 441 049',577,'Credit Card ',13,15,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Processing ','P.O. Box 240, 631 Quam, St.','974 353 673',376,'Credit Card ',14,16,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Deliveried','P.O. Box 264, 7686 Mollis St.','901 715 595',2512,'Credit Card ',8,17,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES ('Wainting for payment ','396-1328 Scelerisque, Road','904 053 178',1985,'Credit Card ',11,18,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Shipped Out ','P.O. Box 487, 7301 Eu St.','961 389 045',2541,'Credit Card ',15,19,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Deliveried','Ap #512-1247 Netus Road','908 561 667',922,' Paypal ',14,20,'2018-10-06','2018-01-03');

INSERT INTO payment (id,method,amount,date) VALUES (1,' MBWay',405,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (2,'Credit Card ',271,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (3,' Paypal ',1043,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (4,' MBWay',602,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (5,'Credit Card ',577,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (6,'Credit Card ',722,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (7,' Paypal ',641,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (8,' MBWay',466,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (9,' MBWay',864,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (10,' Paypal ',667,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (11,' Paypal ',915,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (12,' Paypal ',1079,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (13,'Credit Card ',183,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (14,' Paypal ',752,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (15,' Paypal ',711,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (16,' MBWay',272,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (17,' MBWay',121,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (18,' Paypal ',930,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (19,'Credit Card ',301,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (20,' Paypal ',1344,'2018-01-03');


INSERT INTO product_category (id,name) VALUES (1,'Computers');
INSERT INTO product_category (id,name) VALUES (2,'Accessories');
INSERT INTO product_category (id,name) VALUES (3,'Mobile');
INSERT INTO product_category (id,name) VALUES (4,'Consoles');
INSERT INTO product_category (id,name) VALUES (5,'Components');

INSERT INTO product_order (id_product,id_order) VALUES (6,8);
INSERT INTO product_order (id_product,id_order) VALUES (20,6);
INSERT INTO product_order (id_product,id_order) VALUES (7,1);
INSERT INTO product_order (id_product,id_order) VALUES (7,17);
INSERT INTO product_order (id_product,id_order) VALUES (18,10);
INSERT INTO product_order (id_product,id_order) VALUES (14,13);
INSERT INTO product_order (id_product,id_order) VALUES (12,11);
INSERT INTO product_order (id_product,id_order) VALUES (9,8);
INSERT INTO product_order (id_product,id_order) VALUES (17,7);
INSERT INTO product_order (id_product,id_order) VALUES (19,6);
INSERT INTO product_order (id_product,id_order) VALUES (4,15);
INSERT INTO product_order (id_product,id_order) VALUES (13,17);
INSERT INTO product_order (id_product,id_order) VALUES (12,1);
INSERT INTO product_order (id_product,id_order) VALUES (18,19);
INSERT INTO product_order (id_product,id_order) VALUES (15,9);
INSERT INTO product_order (id_product,id_order) VALUES (12,7);
INSERT INTO product_order (id_product,id_order) VALUES (5,20);
INSERT INTO product_order (id_product,id_order) VALUES (14,14);
INSERT INTO product_order (id_product,id_order) VALUES (8,15);
INSERT INTO product_order (id_product,id_order) VALUES (15,4);

INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (1,5,'tempor augue ac ipsum. Phasellus vitae mauris','2018-08-25',6,4);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (2,1,'eget, dictum placerat, augue. Sed molestie. Sed id risus quis diam','2018-08-10',11,10);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (3,1,'Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis','2018-08-10',12,3);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (4,3,'Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus','2018-08-10',8,14);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (5,5,'hendrerit. Donec','2018-08-10',16,12);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (6,5,'ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae','2018-08-10',17,16);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (7,4,'sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus non, egestas a, dui. Cras pellentesque.','2018-08-10',19,20);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (8,3,'placerat','2018-08-10',4,12);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (9,4,'sem mollis dui, in sodales elit erat vitae risus.','2018-08-10',20,1);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (10,1,'purus. Maecenas libero est, congue a, aliquet vel, vulputate eu,','2018-08-10',16,9);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (11,5,'lorem ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque','2018-08-10',10,4);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (12,5,'mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus et magnis','2018-08-10',3,10);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (13,3,'vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla','2018-08-10',2,3);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (14,4,'urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam','2018-08-10',19,7);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (15,2,'arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam.','2018-08-10',13,12);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (16,5,'non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus non, egestas a, dui. Cras','2018-08-10',7,12);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (17,3,'cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit','2018-08-10',17,3);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (18,2,'vitae, orci. Phasellus dapibus quam quis diam. Pellentesque','2018-08-10',9,10);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (19,3,'accumsan neque et nunc. Quisque ornare tortor at risus. Nunc ac sem ut dolor dapibus','2018-08-10',14,19);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (20,4,'ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at,','2018-08-10',18,6);

INSERT INTO single_category (id_product,id_product_category) VALUES (1,1);
INSERT INTO single_category (id_product,id_product_category) VALUES (2,2);
INSERT INTO single_category (id_product,id_product_category) VALUES (3,3);
INSERT INTO single_category (id_product,id_product_category) VALUES (4,2);
INSERT INTO single_category (id_product,id_product_category) VALUES (5,1);
INSERT INTO single_category (id_product,id_product_category) VALUES (6,3);
INSERT INTO single_category (id_product,id_product_category) VALUES (7,4);
INSERT INTO single_category (id_product,id_product_category) VALUES (8,5);
INSERT INTO single_category (id_product,id_product_category) VALUES (9,4);
INSERT INTO single_category (id_product,id_product_category) VALUES (10,5);
INSERT INTO single_category (id_product,id_product_category) VALUES (11,1);
INSERT INTO single_category (id_product,id_product_category) VALUES (12,2);
INSERT INTO single_category (id_product,id_product_category) VALUES (13,4);
INSERT INTO single_category (id_product,id_product_category) VALUES (14,4);
INSERT INTO single_category (id_product,id_product_category) VALUES (15,4);
INSERT INTO single_category (id_product,id_product_category) VALUES (16,2);
INSERT INTO single_category (id_product,id_product_category) VALUES (17,1);
INSERT INTO single_category (id_product,id_product_category) VALUES (18,2);
INSERT INTO single_category (id_product,id_product_category) VALUES (19,2);
INSERT INTO single_category (id_product,id_product_category) VALUES (20,3);


INSERT INTO "history_product" (id,date,description,price) VALUES (1,'2018-09-10','egestas, urna justo faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor odio a purus. Duis',1083);
INSERT INTO "history_product" (id,date,description,price) VALUES (2,'2018-09-10','ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim',453);
INSERT INTO "history_product" (id,date,description,price) VALUES (3,'2018-09-10','egestas hendrerit neque. In ornare sagittis felis. Donec tempor, est ac mattis semper, dui lectus rutrum urna, nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque penatibus et magnis dis parturient',997);
INSERT INTO "history_product" (id,date,description,price) VALUES (4,'2018-09-10','erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a nunc. In at pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue,',232);
INSERT INTO "history_product" (id,date,description,price) VALUES (5,'2018-09-10','elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat nunc',420);
INSERT INTO "history_product" (id,date,description,price) VALUES (6,'2018-09-10','Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas',501);
INSERT INTO "history_product" (id,date,description,price) VALUES (7,'2018-09-10','magna sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis felis. Donec tempor, est ac mattis semper, dui lectus rutrum urna, nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque penatibus et magnis dis',678);
INSERT INTO "history_product" (id,date,description,price) VALUES (8,'2018-09-10','parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum metus. Aenean sed pede nec ante blandit viverra. Donec tempus, lorem fringilla ornare placerat, orci lacus vestibulum lorem, sit amet ultricies sem magna nec quam. Curabitur vel lectus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus.',901);
INSERT INTO "history_product" (id,date,description,price) VALUES (9,'2018-09-10','vitae purus gravida sagittis. Duis gravida. Praesent eu nulla at sem molestie sodales. Mauris blandit enim consequat purus. Maecenas libero est, congue a, aliquet vel, vulputate eu, odio. Phasellus at augue id ante dictum cursus. Nunc mauris elit, dictum eu, eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus in felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis risus. In mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec',925);
INSERT INTO "history_product" (id,date,description,price) VALUES (10,'2018-09-10','sit amet ornare lectus justo eu arcu. Morbi sit amet massa. Quisque porttitor eros nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam. Duis mi enim, condimentum eget, volutpat ornare, facilisis eget, ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales',846);
INSERT INTO "history_product" (id,date,description,price) VALUES (11,'2018-09-10','ornare, libero at auctor ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo eu arcu. Morbi sit amet massa. Quisque porttitor eros nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam. Duis mi enim, condimentum eget, volutpat ornare, facilisis eget, ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus.',64);
INSERT INTO "history_product" (id,date,description,price) VALUES (12,'2018-09-10','est ac facilisis facilisis, magna tellus faucibus leo, in lobortis tellus justo sit amet nulla. Donec non justo. Proin non massa non ante bibendum ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus',305);
INSERT INTO "history_product" (id,date,description,price) VALUES (13,'2018-09-10','Donec non justo. Proin non massa non ante bibendum ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum metus. Aenean sed pede nec ante blandit viverra. Donec tempus,',1292);
INSERT INTO "history_product" (id,date,description,price) VALUES (14,'2018-09-10','metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat vitae risus. Duis a mi fringilla mi lacinia mattis. Integer eu',966);
INSERT INTO "history_product" (id,date,description,price) VALUES (15,'2018-09-10','Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam',64);
INSERT INTO "history_product" (id,date,description,price) VALUES (16,'2018-09-10','erat. Sed nunc est, mollis non, cursus non, egestas a, dui. Cras pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum leo elementum sem, vitae aliquam eros turpis non enim. Mauris quis turpis',925);
INSERT INTO "history_product" (id,date,description,price) VALUES (17,'2018-09-10','fermentum risus, at fringilla purus mauris a nunc. In at pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam',225);
INSERT INTO "history_product" (id,date,description,price) VALUES (18,'2018-09-10','aliquam arcu. Aliquam ultrices iaculis odio. Nam interdum enim non nisi. Aenean eget metus. In nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus non, egestas a, dui. Cras pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna.',812);
INSERT INTO "history_product" (id,date,description,price) VALUES (19,'2018-09-10','tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus',647);
INSERT INTO "history_product" (id,date,description,price) VALUES (20,'2018-09-10','nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque. Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum',224);

INSERT INTO "single_history_product" (id_history_product,id_product) VALUES (1,7);
INSERT INTO "single_history_product" (id_history_product,id_product) VALUES (2,5);
INSERT INTO "single_history_product" (id_history_product,id_product) VALUES (3,10);
INSERT INTO "single_history_product" (id_history_product,id_product) VALUES (4,18);
INSERT INTO "single_history_product" (id_history_product,id_product) VALUES (5,20);
INSERT INTO "single_history_product" (id_history_product,id_product) VALUES (6,13);
INSERT INTO "single_history_product" (id_history_product,id_product) VALUES (7,2);
INSERT INTO "single_history_product" (id_history_product,id_product) VALUES (8,1);
INSERT INTO "single_history_product" (id_history_product,id_product) VALUES (9,13);
INSERT INTO "single_history_product" (id_history_product,id_product) VALUES (10,1);
INSERT INTO "single_history_product" (id_history_product,id_product) VALUES (11,10);
INSERT INTO "single_history_product" (id_history_product,id_product) VALUES (12,12);
INSERT INTO "single_history_product" (id_history_product,id_product) VALUES (13,9);
INSERT INTO "single_history_product" (id_history_product,id_product) VALUES (14,6);
INSERT INTO "single_history_product" (id_history_product,id_product) VALUES (15,7);
INSERT INTO "single_history_product" (id_history_product,id_product) VALUES (16,13);
INSERT INTO "single_history_product" (id_history_product,id_product) VALUES (17,12);
INSERT INTO "single_history_product" (id_history_product,id_product) VALUES (18,6);
INSERT INTO "single_history_product" (id_history_product,id_product) VALUES (19,13);
INSERT INTO "single_history_product" (id_history_product,id_product) VALUES (20,4);

INSERT INTO "featured_product" (id,date) VALUES (1,'2018-04-03');
INSERT INTO "featured_product" (id,date) VALUES (2,'2018-04-03');
INSERT INTO "featured_product" (id,date) VALUES (3,'2018-04-03');
INSERT INTO "featured_product" (id,date) VALUES (4,'2018-04-03');

INSERT INTO "single_featured_product" (id_product,id_featured_product) VALUES (16,1);
INSERT INTO "single_featured_product" (id_product,id_featured_product) VALUES (7,2);
INSERT INTO "single_featured_product" (id_product,id_featured_product) VALUES (6,3);
INSERT INTO "single_featured_product" (id_product,id_featured_product) VALUES (2,4);
