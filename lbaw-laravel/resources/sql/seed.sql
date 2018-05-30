-- Tables
DROP TABLE IF EXISTS brand CASCADE;
DROP TABLE IF EXISTS favorite CASCADE;
DROP TABLE IF EXISTS "order" CASCADE;
DROP TABLE IF EXISTS payment CASCADE;
DROP TABLE IF EXISTS product CASCADE;
DROP TABLE IF EXISTS "user" CASCADE;
DROP TABLE IF EXISTS history_product CASCADE;
DROP TABLE IF EXISTS product_category CASCADE;
DROP TABLE IF EXISTS cart CASCADE;
DROP TABLE IF EXISTS product_order CASCADE;
DROP TABLE IF EXISTS featured_product CASCADE;
DROP TABLE IF EXISTS review CASCADE;
DROP TABLE IF EXISTS single_history_product CASCADE;
DROP TABLE IF EXISTS single_featured_product CASCADE;
DROP TABLE IF EXISTS users CASCADE;
DROP TABLE IF EXISTS cards CASCADE;
DROP TABLE IF EXISTS items CASCADE;
DROP TABLE IF EXISTS password_resets CASCADE;



CREATE TABLE brand (
    id SERIAL,
    name text NOT NULL
);

CREATE TABLE favorite (
    id_user integer,
    id_product integer,
    addition_date timestamp with time zone
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
    id_brand integer,
    pic text DEFAULT 'default.png',
    id_category integer,
    score real,
    CONSTRAINT stock_positive CHECK ((stock >= 0)),
    CONSTRAINT price_positive CHECK ((price > 0))
);


CREATE TABLE product_category (
    id SERIAL,
    name text NOT NULL,
    icon text
);


CREATE TABLE product_order (
    id_product integer,
    id_order integer,
    quantity integer
);

CREATE TABLE cart (
    id_product integer,
    id_user integer,
    quantity integer
);


CREATE TABLE review (
    id SERIAL,
    score real,
    comment text NOT NULL,
    date timestamp with time zone NOT NULL,
    id_product integer,
    id_user integer
);



CREATE TABLE "user" (
    id SERIAL,
    email text NOT NULL,
    username text NOT NULL,
    password text,
    address text,
    city text,
    zip text,
    provider text,
    provider_id text,
    permissions text NOT NULL,
    blocked integer DEFAULT 0,
    avatar text DEFAULT 'default.png',
    remember_token VARCHAR
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

CREATE TABLE password_resets (
  email VARCHAR(255) unique,
  token VARCHAR(255) not null,
  created_at timestamp
);

-- Primary Keys and Uniques

ALTER TABLE ONLY brand
    ADD CONSTRAINT brand_pkey PRIMARY KEY (id);

ALTER TABLE ONLY brand
    ADD CONSTRAINT brand_name UNIQUE (name);

ALTER TABLE ONLY favorite
    ADD CONSTRAINT favorite_pkey PRIMARY KEY (id_user, id_product);

ALTER TABLE ONLY cart
ADD CONSTRAINT cart_pkey PRIMARY KEY (id_product, id_user);

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

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_email_key UNIQUE (email);

ALTER TABLE ONLY "user"
    ADD CONSTRAINT username_key UNIQUE (username);

ALTER TABLE ONLY single_featured_product
    ADD CONSTRAINT single_featured_product_pkey PRIMARY KEY (id_product, id_featured_product);


    -- Foreign Keys

ALTER TABLE ONLY favorite
    ADD CONSTRAINT favorite_id_user_fkey FOREIGN KEY (id_user) REFERENCES "user"(id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ONLY favorite
    ADD CONSTRAINT favorite_id_product_fkey FOREIGN KEY (id_product) REFERENCES product(id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ONLY cart
ADD CONSTRAINT cart_id_user_fkey FOREIGN KEY(id_user) REFERENCES "user"(id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ONLY cart
ADD CONSTRAINT cart_id_product_fkey FOREIGN KEY(id_product) REFERENCES product(id) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE ONLY "order"
    ADD CONSTRAINT order_id_user_fkey FOREIGN KEY (id_user) REFERENCES "user"(id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ONLY payment
    ADD CONSTRAINT payment_id_order_fkey FOREIGN KEY (id_order) REFERENCES "order"(id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ONLY product
    ADD CONSTRAINT product_id_brand_fkey FOREIGN KEY (id_brand) REFERENCES brand(id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ONLY product
  ADD CONSTRAINT product_id_category_fkey FOREIGN KEY (id_category) REFERENCES product_category(id) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE ONLY product_order
    ADD CONSTRAINT product_order_id_product_fkey FOREIGN KEY (id_product) REFERENCES product(id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ONLY product_order
    ADD CONSTRAINT product_order_id_order_fkey FOREIGN KEY (id_order) REFERENCES "order"(id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ONLY review
    ADD CONSTRAINT review_id_user_fkey FOREIGN KEY (id_user) REFERENCES "user"(id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ONLY review
    ADD CONSTRAINT review_id_product_fkey FOREIGN KEY (id_product) REFERENCES product(id) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE ONLY single_history_product
    ADD CONSTRAINT single_history__history_product_fkey FOREIGN KEY (id_history_product) REFERENCES history_product(id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ONLY single_history_product
    ADD CONSTRAINT single_history_product_id_product_fkey FOREIGN KEY (id_product) REFERENCES product(id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ONLY single_featured_product
    ADD CONSTRAINT single_featured_product_id_product_fkey FOREIGN KEY (id_product) REFERENCES product(id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ONLY single_featured_product
ADD CONSTRAINT single_featured_product_id__featured_product_fkey FOREIGN KEY (id_featured_product) REFERENCES featured_product(id) ON DELETE CASCADE ON UPDATE CASCADE;






INSERT INTO brand (id,name) VALUES (DEFAULT,'Asus');
INSERT INTO brand (id,name) VALUES (DEFAULT,'HP');
INSERT INTO brand (id,name) VALUES (DEFAULT,'Apple');
INSERT INTO brand (id,name) VALUES (DEFAULT,'Samsung');
INSERT INTO brand (id,name) VALUES (DEFAULT,'Xiaomi');
INSERT INTO brand (id,name) VALUES (DEFAULT,'OnePlus');
INSERT INTO brand (id,name) VALUES (DEFAULT,'Huawei');
INSERT INTO brand (id,name) VALUES (DEFAULT,'Toshiba');
INSERT INTO brand (id,name) VALUES (DEFAULT,'Lenovo');
INSERT INTO brand (id,name) VALUES (DEFAULT,'Nokia');
INSERT INTO brand (id,name) VALUES (DEFAULT,'Acer');
INSERT INTO brand (id,name) VALUES (DEFAULT,'Dell');
INSERT INTO brand (id,name) VALUES (DEFAULT,'Microsoft');
INSERT INTO brand (id,name) VALUES (DEFAULT,'LG');
INSERT INTO brand (id,name) VALUES (DEFAULT,'Intel');
INSERT INTO brand (id,name) VALUES (DEFAULT,'AMD');
INSERT INTO brand (id,name) VALUES (DEFAULT,'MSI');
INSERT INTO brand (id,name) VALUES (DEFAULT,'Kingston');
INSERT INTO brand (id,name) VALUES (DEFAULT,'SanDisk');
INSERT INTO brand (id,name) VALUES (DEFAULT,'NVIDIA');
INSERT INTO brand (id,name) VALUES (DEFAULT,'Nintendo');
INSERT INTO brand (id,name) VALUES (DEFAULT,'Sony');


INSERT INTO "user" (id,email,username,password,address,city,zip,permissions,blocked) VALUES (DEFAULT,'vel.est.tempor@google.pt','admin_lbaw','PDB77ZTR5OS','Ap #894-4328 Erat Road', 'Raiganj','5370-253','User',0);
INSERT INTO "user" (id,email,username,password,address,city,zip,permissions,blocked) VALUES (DEFAULT,'egestas@nisl.co.uk','Rama Browning','HSY38MXX8ME','P.O. Box 369, 4403 Massa Avenue','Chapadinha','5370-253','User',0);
INSERT INTO "user" (id,email,username,password,address,city,zip,permissions,blocked) VALUES (DEFAULT,'lobortis.quis.pede@Vivamusrhoncus.net','Olivia Brennan','MOX89EFA0DU','Ap #624-5071 At, Ave','Oostakker','5370-253','User',0);
INSERT INTO "user" (id,email,username,password,address,city,zip,permissions,blocked) VALUES (DEFAULT,'Nulla.facilisi@semeget.org','Charity Livingston','QYA36FRM1NX','9785 Neque St.','Ambala Sadar','5370-253','User',0);
INSERT INTO "user" (id,email,username,password,address,city,zip,permissions,blocked) VALUES (DEFAULT,'nisi@Duiscursus.com','Levi Cervantes','XNW95ZQW9TY','Ap #722-1022 Odio St.','Maria','5370-253','User',0);
INSERT INTO "user" (id,email,username,password,address,city,zip,permissions,blocked) VALUES (DEFAULT,'egestas@diam.edu','Quinn Barnes','IBH69AXY9UU','Ap #515-4663 Nulla Street','Melsele','5370-253','User',0);
INSERT INTO "user" (id,email,username,password,address,city,zip,permissions,blocked) VALUES (DEFAULT,'primis@Integervulputaterisus.com','Xenos Osborn','GMT03GML0QV','P.O. Box 893, 1360 Magna. Ave','Fayetteville','5370-253','User',0);
INSERT INTO "user" (id,email,username,password,address,city,zip,permissions,blocked) VALUES (DEFAULT,'feugiat@pedeSuspendisse.com','Cole Tyson','ONK78OZF8JP','202-214 Lorem Ave','Montpellier','5370-253','User',0);
INSERT INTO "user" (id,email,username,password,address,city,zip,permissions,blocked) VALUES (DEFAULT,'elit.dictum.eu@eget.net','Desirae Vazquez','TGT94CGV0GO','P.O. Box 989, 6124 Mi Avenue','Qualicum Beach','5370-253','User',0);
INSERT INTO "user" (id,email,username,password,address,city,zip,permissions,blocked) VALUES (DEFAULT,'mus.Aenean@velitinaliquet.edu','Xandra Drake','YUT64SMA0OL','6876 Justo Rd.','Musselburgh','5370-253','User',0);
INSERT INTO "user" (id,email,username,password,address,city,zip,permissions,blocked) VALUES (DEFAULT,'nibh.vulputate@est.com','Isaac Dillard','SDJ96YDP4PD','Ap #123-9516 Augue. St.','Ramsel','5370-253','User',0);
INSERT INTO "user" (id,email,username,password,address,city,zip,permissions,blocked) VALUES (DEFAULT,'fringilla.purus.mauris@anequeNullam.org','Hayes Mcpherson','SJG98OFJ0XY','2765 Mi Rd.','Hawick','5370-253','User',0);
INSERT INTO "user" (id,email,username,password,address,city,zip,permissions,blocked) VALUES (DEFAULT,'Suspendisse.aliquet.molestie@atvelit.com','Sydney Mcfadden','QQO20CHT9RF','9359 Lorem Av.','Richmond','5370-253','User',0);
INSERT INTO "user" (id,email,username,password,address,city,zip,permissions,blocked) VALUES (DEFAULT,'risus.Nunc@semutcursus.co.uk','Kaseem Holman','CYZ17ZTS8LO','P.O. Box 464, 9581 Sem Av.','Fort Smith','5370-253','User',0);
INSERT INTO "user" (id,email,username,password,address,city,zip,permissions,blocked) VALUES (DEFAULT,'scelerisque.lorem.ipsum@Maurisquisturpis.org','Tatum Simpson','SHD63JUZ3FH','3972 Sit Rd.','Salem','5370-253','User',0);
INSERT INTO "user" (id,email,username,password,address,city,zip,permissions,blocked) VALUES (DEFAULT,'nostra@ultricesVivamusrhoncus.com','Adara Frazier','VBD69BIR9VV','Ap #667-4458 Mauris Rd.','Recogne','5370-253',' User',0);
INSERT INTO "user" (id,email,username,password,address,city,zip,permissions,blocked) VALUES (DEFAULT,'semper@penatibusetmagnis.edu','Ciaran Singleton','FBI41SUB4DT','Ap #147-4425 Velit Ave','San Juan de la Costa','5370-253','User',0);
INSERT INTO "user" (id,email,username,password,address,city,zip,permissions,blocked) VALUES (DEFAULT,'Morbi.metus.Vivamus@faucibusleo.edu','Sloane Hatfield','JPG58FMP5HH','P.O. Box 882, 3276 Nunc Ave','Cañete','5370-253','User',0);
INSERT INTO "user" (id,email,username,password,address,city,zip,permissions,blocked) VALUES (DEFAULT,'lbaw_admin@google.pt','Zachary Love','$2y$10$.Q3h8TkBwod3avIbBiqkreSoREbfX6LmNbzjxfhPAPQ7nXPMcfZAy','P.O. Box 790, 9016 Vitae Ave','Purnea','5370-253','Admin',0);
INSERT INTO "user" (id,email,username,password,address,city,zip,permissions,blocked) VALUES (DEFAULT,'lbaw1753@google.pt','lbaw1753','$2y$10$.Q3h8TkBwod3avIbBiqkreSoREbfX6LmNbzjxfhPAPQ7nXPMcfZAy','212-7102 Risus. Av.','Águas Lindas de Goiás','5370-253','User',0);
--a pass deste user lbaw1753 é 123456


INSERT INTO product_category (id,name,icon) VALUES (DEFAULT,'Computers','desktop');
INSERT INTO product_category (id,name,icon) VALUES (DEFAULT,'Accessories','headphones');
INSERT INTO product_category (id,name,icon) VALUES (DEFAULT,'Mobile','mobile-alt');
INSERT INTO product_category (id,name,icon) VALUES (DEFAULT,'Consoles','gamepad');
INSERT INTO product_category (id,name,icon) VALUES (DEFAULT,'Components','cogs');

INSERT INTO product (id,name,description,stock,price,id_brand,pic,id_category,score) VALUES (DEFAULT,'IPhone X - 256 GB','smartphone com capacidade de armazenamento de 256 GB e ecrã Super Retina de 5,8” (2436 x 1125 píxeis a 458 ppp), com relação de contraste de 1000000:1; resistente à água e ao pó; Face ID; processador A11 Bionic com arquitetura de 64 bits; carregamento sem fios; câmaras grande angular e teleobjetiva de 12 MP e câmara TrueDepth; gravação vídeo 4K a 24, 30 ou 60 fps; autonomia em conversação (sem fios) de até 21 horas.',25,1349.99,3, 'IphoneX.png',3,0);
INSERT INTO product (id,name,description,stock,price,id_brand,pic,id_category,score) VALUES (DEFAULT,'MacBook Pro','diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut mi. Duis risus odio, auctor vitae, aliquet nec, imperdiet nec, leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod in, dolor. Fusce feugiat. Lorem ipsum dolor sit amet, consectetuer',530,1832.99,3,'MacBook.png',1,0);
INSERT INTO product (id,name,description,stock,price,id_brand,pic,id_category,score) VALUES (DEFAULT,'Huawei P20 Pro',' O Huawei P20 Pro usa a Inteligência Artificial para estabilizar a imagem e captar fotografias com excecional detalhe e nitidez. Além disso, experiencie o poder da Inteligência Artificial da nova Unidade de Processamento de Rede Neural Kirin 970. Com uma vida de bateria impressionante e velocidade superior, é um passo à frente para a série P.',30,798.99,7,'huawei-p20-pro.png',3,0);
INSERT INTO product (id,name,description,stock,price,id_brand,pic,id_category,score) VALUES (DEFAULT,'Samsung S9','O smartphone Samsung Galaxy S9+ rosa púrpura oferece uma experiência de visualização imersiva com o ecrã infinito, que encaixa confortavelmente na sua mão. Curvo sobre os lados, para uma visão que parece ilimitada, o smartphone Samsung Galaxy S9+ permite que crie vídeos fascinantes em Super Câmara Lenta para partilhar com os seus amigos. Adicione música através de uma seleção aleatória de opções pré-carregadas, ou use uma música da sua lista de reprodução. Surpreenda-se, transformando momentos normais do dia-a-dia em memórias épicas com o seu Galaxy S9+. Crie um emoji animado em Realidade Aumentada que se parece realmente consigo. Para começar, basta tirar uma selfie. Personalize-o depois, exibindo todo o seu estilo. Do cabelo às roupas, pode fazer com que o seu emoji se pareça consigo ou com qualquer outra pessoa. Além disso, pode gravar vídeos com o seu novo "eu" animado para partilhar com os amigos. Tire ainda fotos sem pensar duas vezes, independentemente da hora do dia. Com dois modos de abertura da lente, a Dupla Abertura define a qualidade da sua foto, adapta-se à luz brilhante durante o dia e, em condições de luminosidade reduzida, ajusta-se também, automaticamente, tal como o olho humano, garantindo-lhe fotos incríveis. Pode ainda dar asas ao seu lado artístico, alternando a abertura para criar diferentes ambientes.',3,921.99,4,'s9.png',3,0);
INSERT INTO product (id,name,description,stock,price,id_brand,pic,id_category,score) VALUES (DEFAULT,'Xiaomi Mi Mix 2 S 64GB','O smartphone Xiaomi Mi Mix 2 preto, com capacidade de armazenamento de 64 GB, apresenta design de exibição imersiva, cujas margens são 12% mais pequenas do que o antecessor Mi Mix e o ecrã exibe relação de aspeto de 18:9 - resultado da pesquisa implacável da Xiaomi na inovação tecnológica. Assim, o smartphone Xiaomi Mi Mix 2 conta com um grande ecrã de 5,99" alojado num corpo que é menor do que o dos smartphones típicos com ecrã de 5,5". A inovação na tecnologia de exibição em ecrã cheio introduz margens mais estreitas, uma câmara frontal menor e um sensor de proximidade oculto que se adapta perfeitamente ao Mi Mix 2 na palma da sua mão. De facto, o Mi Mix 2 está vestido para impressionar e é ainda altamente durável graças à estrutura de liga de alumínio de grau aeroespacial. Extremamente fino e leve, o smartphone Xiaomi Mi Mix 2 destaca-se ainda pelo poderoso processador Snapdragon 835 Octa-Core (4x 2,45 GHz Kryo & 4x 1,9 GHz Kryo), pelos seus 6 GB de RAM e pelos 64 GB de memória UFS 2.1. Outras características: ecrã touchscreen capacitivo IPS LCD de 5,99” (1080 x 2160 píxeis); proteção Corning Gorilla Glass 4; câmaras de 12 MP e 5 MP; conetividade Wi-Fi e Bluetooth 5.0; leitor de impressão digital; bateria Li-Ion de 3400 mAh.',23,599,5,'mi-mix2.png',4,0);
INSERT INTO product (id,name,description,stock,price,id_brand,pic,id_category,score) VALUES (DEFAULT,'Oneplus 6','RAM

6 GB / 8 GB LPDDR4X
Storage

UFS 2.1 2-LANE 64 GB / 128 GB / 256 GB
Sensors

Fingerprint, Hall, Accelerometer, Gyroscope, Proximity, RGB Ambient Light Sensor, Electronic Compass, Sensor Core
Ports

USB 2.0, Type-C, Support USB Audio
Dual nano-SIM slot
3.5 mm audio jack
Battery

3300 mAh (non-removable) Fast Charging (5V 4A)
Buttons

Gestures and on-screen navigation support Alert Slider
Áudio

Bottom-facing speaker
Noise cancellation support
Dirac HD Sound®
Dirac Power Sound®
Unlock Options

Fingerprint
Face Unlock ',36,519,6,'one_plus6.png',3,3);
INSERT INTO product (id,name,description,stock,price,id_brand,pic,id_category,score) VALUES (DEFAULT,'Smartphone ASUS Zenfone 4 Max ZC554KL 32GB','Este smartphone Asus Zenfone 4 Max Deepsea Black foi desenhado para percorrer distâncias e acompanhar todas as aventuras da sua vida. A bateria de elevada capacidade de 5000 mAh, com gestão de energia avançada e duas câmaras, acompanha um estilo de vida ativo. O ZenFone 4 Max possui um sistema avançado com duas câmaras, concebido para levar a fotografia móvel a outros níveis. A câmara principal de 13 MP vem equipada com uma lente ampla e abertura F2.0 para captar fotos mais nítidas. A sua câmara grande angular de 120º permite enquadrar mais paisagem e pessoas, criando imagens fantásticas, melhores fotos de grupo e uma experiência fotográfica mais conveniente em espaços confinados ou fechados. E, se a câmara PixelMaster de 13 MP traseira capta fotos deslumbrantes de alta resolução sem atrasos do obturador, já a câmara frontal de 8 MP capta selfies nítidas e fantásticas, permitindo desfrutar de conversação vídeo com clareza. Acresce um flash suave Softlight LED e características de melhoramento ao vivo para captar selfies encantadoras com facilidade.',10,223.99,1,'asus_zenfone.png',3,3);


INSERT INTO product (id,name,description,stock,price,id_brand,pic,id_category,score) VALUES (DEFAULT,'Portátil Híbrido 14'' HP Pavilion X360 14','O computador híbrido HP Pavilion x360 14-ba028np possui um inteligente sistema de dobradiças a 360º para oferecer excelente flexibilidade de utilização, permitindo-lhe encontrar a forma mais prática e cómoda de desfrutar de todas as funcionalidades deste dispositivo doméstico em qualquer situação. Alterne facilmente entre o modo tablet para desenhar, o modo portátil para redigir texto de forma prática ou o modo tenda, ideal para a visualização de filmes. Destaque para o ecrã tátil LCD LED de 14“ com resolução FHD e painel IPS, que proporciona ângulos de visualização alargados de até 178º e ótima precisão de cor. No interior deste computador híbrido HP Pavilion x360 14-ba028np, o processador Dual-Core Intel Core i7-7500U a 2,7 GHz (Max Turbo a 3,5 GHz) alia-se a 8 GB de memória RAM para assegurar desempenho de excelência e lidar com todo o tipo de tarefas de computação. Por sua vez, a placa gráfica Intel HD Graphics 620 enriquece a experiência de visualização, conferindo às imagens maior fluidez, naturalidade e realismo. Outras características relevantes: suporte das funcionalidades Windows Ink com caneta ativa; disco SSD de 256 GB; sistema operativo Windows 10 Home; webcam HP Wide Vision e microfone digital de matriz dupla; conetividade Wi-Fi e Bluetooth 4.2; autonomia de até 10 horas e 45 minutos; porta HDMI, porta USB 3.1 Type-C e duas portas USB 3.1',3,849.99,2,'hp_pavilon.png',1,3);
INSERT INTO product (id,name,description,stock,price,id_brand,pic,id_category,score) VALUES (DEFAULT,' LENOVO Ideapad 320-15IKBN','O computador portátil Lenovo IdeaPad 320 320-15IKB-450 foi concebido para tornar mais fácil a vida do utilizador, sendo capaz de lidar com todo o tipo de tarefas de computação e apresentando uma estrutura leve, discreta e de fácil transporte que o acompanha para todo o lado. Execute inúmeros programas em simultâneo, de forma rápida e eficiente, graças ao processador Dual-Core Intel Core i5-7200U a 2,5 GHz (Max Turbo a 3,1 GHz), que se alia a 8 GB de memória RAM para aumentar a produtividade e a capacidade de processamento. Este computador portátil Lenovo IdeaPad 320 320-15IKB-450 conta com um ecrã LCD LED de 15,6” com resolução de 1366 x 768 píxeis e painel anti-brilho, permitindo a utilização em qualquer espaço e assegurando imagens nítidas, com ótima definição. Por sua vez, a placa gráfica NVidia GeForce 920MX com 2 GB de memória dedicada confere maior fluidez e naturalidade às imagens, enriquecendo toda a experiência de visualização. Outras características relevantes: sistema operativo Windows 10 Home; disco HDD de 1 TB; webcam e microfone; conetividade Wi-Fi e Bluetooth 4.1; placa de rede Gigabit; sistema de som estéreo com potência de 1,5 W e tecnologia Dolby; portas HDMI, USB Type-C e duas portas USB 3.0.',2,552.49,9,'lenovo_15.png',1,3);
INSERT INTO product (id,name,description,stock,price,id_brand,pic,id_category,score) VALUES (DEFAULT,' ASUS F505Ba-A9Ar5Cb1','O computador portátil Asus VivoBook F505Ba-A9Ar5Cb1 oferece produtividade sem limites a quem está sempre em movimento, apresentando design leve, discreto e extremamente fácil de transportar. Equipado com o processador Dual-Core AMD A9-9420 a 3 GHz, este computador portátil Asus VivoBook F505Ba-A9Ar5Cb1 garante desempenho rápido e eficiente, fazendo uso de 8 GB de memória RAM para executar múltiplas tarefas em simultâneo. Destaque também para o ecrã Full HD antirreflexo de 15,6” (1920 x 1080 píxeis), capaz de exibir imagens nítidas e precisas, permitindo-lhe desfrutar de ótimos momentos de entretenimento, bem como de elevada produtividade em qualquer lugar. Além disso, a placa gráfica AMD Radeon R5 enriquece ainda mais a experiência de visualização, conferindo às imagens grande naturalidade e fluidez. Por fim, a tecnologia Asus Splendid proporciona as melhores imagens de qualquer tipo de conteúdos, somando quatro modos visuais: Normal; Vivid; Eyecare e Manual. Outras características relevantes: disco HDD de 1 TB; conetividade Wi-Fi e Bluetooth; sistema de som estéreo ICEPower com potência de 2 W; sistema operativo Windows 10 Home; webcam e microfone; portas HDMI, USB 3.1 Type-C, USB 3.0 e duas portas USB 2.0.',30,499.99,1,'asus_pc1.png',1,3);
INSERT INTO product (id,name,description,stock,price,id_brand,pic,id_category,score) VALUES (DEFAULT,'Portátil 15.6" HP 15-ck005np','O computador portátil HP Pavilion 15-ck005np apresenta design moderno e sofisticado, criando um equilíbrio perfeito entre estilo e desempenho. Detentor de um ecrã IPS FHD BrightView de 15,6” com resolução de 1920 x 1080 píxeis, este computador portátil HP Pavilion 15-ck005np permite-lhe desfrutar de filmes e fotografias com incrível qualidade de imagem e detalhes em alta definição, enriquecidos pela placa gráfica NVidia GeForce 940MX com 2 GB dedicados. No interior, o processador Intel Core i7-8550U a 1,8 GHz (Turbo até 4 GHz) alia-se a 8 GB de memória RAM para proporcionar desempenho de excelência e garantir rápidas velocidades de processamento, até nas aplicações mais exigentes. Também em evidência, a capacidade de armazenamento de 1 TB com elevadas velocidades de escrita e leitura, que minimizam os tempos de inicialização do sistema operativo e das aplicações de uso mais frequente. Outras características relevantes: sistema operativo Windows 10 Home; webcam HP Wide Vision com microfone digital de matriz dupla; sistema de som estéreo Bang and Olufsen; leitor de cartões de memória SD multiformato; conetividade Wi-Fi e Bluetooth 4.2.',3,764.99,2,'hp_pc2.png',1,3);


INSERT INTO product (id,name,description,stock,price,id_brand,pic,id_category,score) VALUES (DEFAULT,'Portátil ACER A515-51G','O computador portátil Acer Aspire 5 A515-51G é um dispositivo doméstico preparado para utilização diária intensiva, podendo ser transportado para qualquer lugar e sendo capaz de proporcionar ótimos momentos de entretenimento, bem como excelente desempenho em aplicações de trabalho. Detentor de um ecrã LCD LED de 15,6” com resolução de 1366 x 768 píxeis, este computador portátil Acer Aspire 5 A515-51G exibe imagens cheias de cor e definição, enriquecidas pela placa gráfica NVidia GeForce 940MX com 2 GB de memória dedicada, que confere maior fluidez e naturalidade. No interior encontra-se o processador Dual-Core Intel Core i7-7500U a 2,7 GHz (Max Turbo a 3,5 GHz), que faz uso dos 8 GB de memória RAM para proporcionar maior velocidade de processamento e eficiência. Outras características relevantes: disco HDD de 1 TB; webcam e microfone; sistema de som estéreo; conetividade Wi-Fi; placa de rede Gigabit; autonomia de até sete horas em funcionamento; porta HDMI, porta USB 3.1 Type-C, porta USB 3.0 e duas portas USB 2.0.',5,679.99,11,'acer_pc1.png',1,3);


INSERT INTO product (id,name,description,stock,price,id_brand,pic,id_category,score) VALUES (DEFAULT,'MICROSOFT Surface Laptop 13.5'' Platina','O portátil Microsoft Surface I5-4-128-13.5” Platina foi concebido para o Windows 10 S — otimizado em termos de segurança e desempenho, com aplicações fornecidas através da Loja Windows, garantindo que são verificadas pela Microsoft. Com processador Intel Core i5-7200U, este portátil Microsoft Surface é ideal para fotografias, vídeos, relatórios e apresentações, destacando-se pelo disco SSD de 128 GB, pelos seus 4 GB de RAM e pela placa gráfica Intel HD Graphics 620. De facto, nunca um portátil foi tão pessoal. Fino, leve e potente, com um luxuoso teclado revestido a Alcantara e um design contemporâneo e elegante que pode levar consigo para qualquer lugar, este Microsoft Surface é a combinação perfeita de portabilidade e desempenho. Não tem de escolher entre potência e leveza. Com peso de apenas 1,2 kg, o Surface Laptop dá-lhe uma combinação perfeita de ambos, além de proporcionar uma excelente duração da bateria. Navegue de forma mais rápida e natural no vibrante e envolvente ecrã tátil PixelSense de 13,5” (2256 x 1504 píxeis). Desfrute de mais espaço para as suas ideias no ecrã, que cobre toda a superfície do dispositivo, com uma moldura extrafina. ',6,993.65,13,'microsoft_pc1.png',1,3);


INSERT INTO product (id,name,description,stock,price,id_brand,pic,id_category,score) VALUES (DEFAULT,'Portátil 14'' ASUS S410UN-78AM5CB1','O computador portátil Asus VivoBook S410UN-78AM5CB1 oferece produtividade sem limites a quem está sempre em movimento, apresentando design leve, discreto e extremamente fácil de transportar. Equipado com o processador Intel Core i7-8550U a 1,8 GHz (Turbo até 4 GHz), este computador portátil Asus VivoBook S14 S410UN-78AM5CB1 garante desempenho rápido e eficiente, fazendo uso de 16 GB de memória RAM para executar múltiplas tarefas em simultâneo. Destaque também para o ecrã NanoEdge LCD LED de 14” (1920 x 1080 píxeis), sem margens e com resolução Full HD, capaz de exibir imagens nítidas e precisas, permitindo-lhe desfrutar de ótimos momentos de entretenimento, bem como de elevada produtividade em qualquer lugar. Além disso, a placa gráfica NVidia GeForce MX150 com 4 GB de memória dedicada enriquece ainda mais a experiência de visualização, conferindo às imagens grande naturalidade e fluidez. Outras características relevantes: disco SSD de 512 GB; conetividade Wi-Fi e Bluetooth 4.2; sistema de som estéreo ICEPower com potência de 2 W; sistema operativo Windows 10; webcam e microfone; portas HDMI, USB 3.1 Type-C, USB 3.0 e duas portas USB 2.0.',14,1104.15,1,'asus_pc2.png',1,3);


INSERT INTO product (id,name,description,stock,price,id_brand,pic,id_category,score) VALUES (DEFAULT,'MacBook Pro 15'' Retina APPLE MJLQ2','Este MacBook Pro Retina MJLQ2 de 15 integra um processador Intel Core i7 a 2,5 GHz e uma placa gráfica Intel Iris Pro Graphics de elevado desempenho - a potência de que necessita para tirar o máximo partido de cada píxel. O ecrã Retina (2880 x 1800 píxeis) tem quase mais 2 milhões de píxeis do que um televisor HD. Destaque ainda para a inclusão da câmara FaceTime HD 720p e para a autonomia de até 9 horas com uma só carga. Outras características: microfones duplos; Wi-Fi e Bluetooth; Hyper Threading; gestos Multi-Touch; trackpad Force Touch; 16 GB de RAM; disco rígido de 1 TB; Wi-Fi; 2x Thunderbolt 2; 2x USB 3; HDMI; Magsafe 2; ranhura para cartões SDXC; iCloud.',9,2668.15,3,'mac_pc1.png',1,3);



INSERT INTO product (id,name,description,stock,price,id_brand,pic,id_category,score) VALUES (DEFAULT,'Consola NINTENDO Switch Cinzenta','A Nintendo Switch é uma revolucionária consola doméstica que pode ser ligada a uma TV em casa, mas que pode imediatamente transformar-se numa consola portátil com um ecrã de 6,2 polegadas. Pela primeira vez, os jogadores terão a oportunidade de usufruir de uma consola de utilização primariamente doméstica em qualquer altura e em qualquer lugar. O ecrã contará com um painel de toque capacitivo para jogos compatíveis. A bateria poderá durar mais de seis horas, mas variará consoante o título jogado e as condições de utilização.',23,329.99,21,'switch.png',4,3);


INSERT INTO product (id,name,description,stock,price,id_brand,pic,id_category,score) VALUES (DEFAULT,'Consola PS4 Slim 500GB Preta','A PlayStation 4 Slim, estilizada e compacta mas com a mesma potência de jogo, oferece uma experiência de jogo inédita, grafismos dinâmicos e realistas, personalização inteligente e múltiplas funcionalidades ligadas às redes sociais. Tecnicamente, o sistema possui um chip Octa Core x86-64 e um processador gráfico 1,84 TFLOPS com 8 GB de memória unificada GDDR5, a que se soma um disco rígido de 500 GB. Este equipamento de topo facilita a programação dos jogos e melhora também a qualidade do conteúdo. Inclui comando DualShock4, que oferece novas perspetivas de interação, graças aos sensores de seis eixos de alta sensibilidade e ao touch pad único. Outras características: cabo de alimentação AC; cabos HDMI e USB; Ethernet; Bluetooth 4.0; Wi-Fi.',34,299.99,22,'ps4.png',4,3);


INSERT INTO product (id,name,description,stock,price,id_brand,pic,id_category,score) VALUES (DEFAULT,'Consola Xbox One S 1TB','HDR (High Dynamic Range);40% mais Compacta;4K Ultra HD e HDR Support;4K Ultra HD Blu-ray player',30,249.99,13,'xbox.png',4,0);


INSERT INTO product (id,name,description,stock,price,id_brand,pic,id_category,score) VALUES (DEFAULT,'Placa Gráfica GIGABYTE Aorus NVidia GeForce GTX 1080 Ti Xtreme Edition 11G','A placa gráfica Gigabyte Aorus NVidia GeForce GTX 1080 Ti Xtreme Edition 11G foi concebida especificamente para equipar computadores de gaming e oferecer desempenho gráfico de excelência, apresentando velocidade de relógio de 1746 MHz e 11 GB de memória GDDR5 a 11448 MHz. Para manter os componentes em funcionamento a temperaturas baixas, esta placa gráfica integra um complexo sistema de refrigeração Aorus, composto por três ventoinhas Windforce com diâmetro de 100 mm, uma placa de cobre em contacto direto com o GPU, tubos de calor para conduzir o ar quente para longe dos componentes e uma larga placa de dissipação. Esta placa gráfica Gigabyte Aorus NVidia GeForce GTX 1080 Ti Xtreme Edition 11G destaca-se também pela iluminação LED multicolorida, programável e sincronizável com os restantes equipamentos de gaming, criando um aspeto moderno e atrativo. Outras características relevantes: preparada para realidade virtual; tecnologia NVidia G-Sync; tecnologia Multi-GPU NVidia SLI; interface de memória de 352 bits; suporte de DirectX 12; Dual-Link DVI-D; 3x HDMI 2.0; 3x DisplayPort 1.4.',3,1099,20,'nvidia_1.png',5,3);


INSERT INTO product (id,name,description,stock,price,id_brand,pic,id_category,score) VALUES (DEFAULT,'Processador INTEL COREI7 6850K LGA2011-3','O processador Intel Core i7-6850K com processo de fabrico de 14 nm para socket Intel LGA 2011-3, foi concebido especificamente para proporcionar ótimo desempenho a computadores de secretária. Os seis núcleos funcionam à velocidade de relógio base de 3,6 GHz, podendo atingir os 3,8 GHz em Max Turbo. Este processador Intel Core i7-6850K possibilita controlar até quatro módulos de memória RAM DDR4 com velocidade máxima de 2400 MHz, obtendo poder e velocidade suficientes para executar todo o tipo de programas, até os mais exigentes. Outras características relevantes: tecnologias Intel HyperThread, Smart Response e Turbo Boost Max 3.0; compatibilidade com DirectX 12; 12 threads; memória cache de 15 MB; TDP (Thermal Design Power) de 140 W.',137, 729.99, 15,'intel-core-i7.png',5,0);

INSERT INTO product (id,name,description,stock,price,id_brand,pic,id_category,score) VALUES (DEFAULT,'SDXC KINGSTON 128GB CANVAS REACT 1','Capacidade128 GB, Classe da Memória FlashClass 10, Velocidade de leitura (máx.) 100MB/s, Velocidade de Escrita (máxima)70MB/s, Peso 0,01, Cor black', 33, 84.99, 18, 'kingston-128gb.png', 5, 0);

INSERT INTO product (id,name,description,stock,price,id_brand,pic,id_category,score) VALUES (DEFAULT,'IPhone 8 Plus 256GB Dourado','smartphone com capacidade de armazenamento de 256 GB, e ecrã LCD Retina HD de 5,5” (1920 x 1080 píxeis); tecnologias True Tone e 3D Touch; vidro extra-resistente e contorno em alumínio de qualidade aeroespacial; carregamento sem fios; revestimento oleofóbico; Touch ID; processador A11 Bionic com arquitetura de 64 bits; vídeo 4K até 60 fps; câmaras de 12 e 7 MP.', 25, 1119.99, 3, 'iphone8.png',3,0);

INSERT INTO product (id,name,description,stock,price,id_brand,pic,id_category,score) VALUES (DEFAULT,'Auscultadores Bluetooth SONY WH-CH400 G.CE7 em Cinzento','Ligação NFC e Bluetooth 4.2, Autonomia até 20h, Tempo de carregamento aprox. 4.5h, Utilize os botões para reproduzir, parar ou avançar entre as faixas e ajustar o volume', 88, 59.99, 22, 'sony-head.png',2,0);


INSERT INTO favorite (id_user,id_product,addition_date) VALUES (1,1,'2018-04-05');
INSERT INTO favorite (id_user,id_product,addition_date) VALUES (20,1,'2018-04-05');
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
INSERT INTO favorite (id_user,id_product,addition_date) VALUES (20,2,'2018-04-05');
INSERT INTO favorite (id_user,id_product,addition_date) VALUES (9,7,'2018-04-05');
INSERT INTO favorite (id_user,id_product,addition_date) VALUES (12,8,'2018-04-05');

INSERT INTO cart(id_product, id_user, quantity) VALUES (1,20,2);
INSERT INTO cart(id_product, id_user, quantity) VALUES (3,20,1);
INSERT INTO cart(id_product, id_user, quantity) VALUES (5,20,1);

INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Deliveried','Ap #699-800 Ligula St.','981 553 524',2203,'Credit Card ',11,DEFAULT,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Processing ','P.O. Box 328, 3629 Luctus Avenue','915 449 883',244,'Credit Card ',17,DEFAULT,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES ('Wainting for payment ','125-2064 Non Rd.','912 223 293',2606,' Paypal ',5,DEFAULT,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Deliveried','5728 Duis Rd.','923 049 699',1373,' Paypal ',15,DEFAULT,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Paid ','406-5972 Est, Ave','997 575 459',133,'Credit Card ',3,DEFAULT,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Processing ','Ap #739-7587 Enim St.','929 674 574',2177,' Paypal ',14,DEFAULT,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Dispatched ','141-4427 Nunc St.','921 047 241',568,' Paypal ',19,DEFAULT,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Paid ','P.O. Box 414, 8721 Fusce Rd.','911 618 718',618,' Paypal ',9,DEFAULT,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Paid ','825-459 Et Rd.','906 620 148',1932,'Credit Card ',2,DEFAULT,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Deliveried','Ap #368-237 Dictum Ave','926 665 779',2635,' Paypal ',20,DEFAULT,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Paid ','P.O. Box 429, 4162 Aliquam Rd.','974 961 497',2413,'Credit Card ',16,DEFAULT,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Paid ','908-3078 Egestas, Rd.','945 787 498',2913,'Credit Card ',11,DEFAULT,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Processing ','7485 Sapien Rd.','984 004 124',473,' Paypal ',16,DEFAULT,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Paid ','Ap #887-8670 Ante, Ave','926 430 684',1589,'Credit Card ',11,DEFAULT,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Paid ','P.O. Box 309, 2462 A St.','902 441 049',577,'Credit Card ',13,DEFAULT,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Processing ','P.O. Box 240, 631 Quam, St.','974 353 673',376,'Credit Card ',14,DEFAULT,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Deliveried','P.O. Box 264, 7686 Mollis St.','901 715 595',2512,'Credit Card ',8,DEFAULT,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES ('Wainting for payment ','396-1328 Scelerisque, Road','904 053 178',1985,'Credit Card ',11,DEFAULT,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Shipped Out ','P.O. Box 487, 7301 Eu St.','961 389 045',2541,'Credit Card ',15,DEFAULT,'2018-10-06','2018-01-03');
INSERT INTO "order" (status,address,contact,total_cost,payment_method,id_user,id,delivery_date,payment_date) VALUES (' Deliveried','Ap #512-1247 Netus Road','908 561 667',922,' Paypal ',14,DEFAULT,'2018-10-06','2018-01-03');

INSERT INTO payment (id,method,amount,date) VALUES (DEFAULT,' MBWay',405,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (DEFAULT,'Credit Card ',271,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (DEFAULT,' Paypal ',1043,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (DEFAULT,' MBWay',602,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (DEFAULT,'Credit Card ',577,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (DEFAULT,'Credit Card ',722,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (DEFAULT,' Paypal ',641,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (DEFAULT,' MBWay',466,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (DEFAULT,' MBWay',864,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (DEFAULT,' Paypal ',667,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (DEFAULT,' Paypal ',915,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (DEFAULT,' Paypal ',1079,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (DEFAULT,'Credit Card ',183,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (DEFAULT,' Paypal ',752,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (DEFAULT,' Paypal ',711,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (DEFAULT,' MBWay',272,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (DEFAULT,' MBWay',121,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (DEFAULT,' Paypal ',930,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (DEFAULT,'Credit Card ',301,'2018-01-03');
INSERT INTO payment (id,method,amount,date) VALUES (DEFAULT,' Paypal ',1344,'2018-01-03');


INSERT INTO product_order (id_product,id_order,quantity) VALUES (6,8,1);
INSERT INTO product_order (id_product,id_order,quantity) VALUES (20,6,3);
INSERT INTO product_order (id_product,id_order,quantity) VALUES (7,1,2);
INSERT INTO product_order (id_product,id_order,quantity) VALUES (7,17,4);
INSERT INTO product_order (id_product,id_order,quantity) VALUES (18,10,1);
INSERT INTO product_order (id_product,id_order,quantity) VALUES (14,13,1);
INSERT INTO product_order (id_product,id_order,quantity) VALUES (12,11,1);
INSERT INTO product_order (id_product,id_order,quantity) VALUES (9,8,2);
INSERT INTO product_order (id_product,id_order,quantity) VALUES (17,7,3);
INSERT INTO product_order (id_product,id_order,quantity) VALUES (19,6,4);
INSERT INTO product_order (id_product,id_order,quantity) VALUES (4,15,2);
INSERT INTO product_order (id_product,id_order,quantity) VALUES (13,17,2);
INSERT INTO product_order (id_product,id_order,quantity) VALUES (12,1,2);
INSERT INTO product_order (id_product,id_order,quantity) VALUES (18,19,1);
INSERT INTO product_order (id_product,id_order,quantity) VALUES (15,9,3);
INSERT INTO product_order (id_product,id_order,quantity) VALUES (12,7,5);
INSERT INTO product_order (id_product,id_order,quantity) VALUES (5,20,3);
INSERT INTO product_order (id_product,id_order,quantity) VALUES (14,14,1);
INSERT INTO product_order (id_product,id_order,quantity) VALUES (8,15,2);
INSERT INTO product_order (id_product,id_order,quantity) VALUES (15,4,2);

INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,5,'Melhor marca chinesa no mercado! Flagship killer sem duvida!!','2018-08-25',6,4);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,1,'Yet one that really paid off six months into our testing.One that was sorely needed after years of similarity and the premium design, extra power.Losing the home button and altering the design was a dangerous move.','2018-08-10',1,10);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,1,'Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis','2018-08-10',12,3);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,3,'Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus','2018-08-10',8,14);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,5,'hendrerit. Donec','2018-08-10',16,12);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,5,'ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae','2018-08-10',17,16);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,4,'sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus non, egestas a, dui. Cras pellentesque.','2018-08-10',19,20);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,3,'Amei o móvel por enquanto é o melhor que já usei a minha opinião é que é melhor que o iPhone X','2018-08-10',4,12);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,4,'One that was sorely needed after years of similarity and the premium design, extra power, all-screen front mix together to create - by far - the best iPhone Apples ever made','2018-08-10',1,1);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,1,'It is impossible to give a perfect score to something that costs this much - but this is the closest to smartphone perfection Apple has ever got.','2018-08-10',16,9);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,5,'lorem ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque','2018-08-10',10,4);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,5,'Bateria dura 2 dias a usar pesado. A camera é simplesmente inigualavel, tal como o modo super noite. Rápido fluído resistente e bem construído. Tenho um s9+ de empresa que ja nem consigo usar. depois de utilizar este equipamemto não so pela duração de bateria de um face ao outro como pela rapidez e intuitividade.','2018-08-10',3,10);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,3,'vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla','2018-08-10',2,3);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,4,'urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam','2018-08-10',19,7);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,2,'arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam.','2018-08-10',13,12);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,5,'Comprei este produto para a minha mulher e foi uma completa surpresa. De realçar a qualidade de construção do equipamento, facilidade de utilização e o melhor de tudo a duração da bateria 9 dias com uma única carga. Excelente produto! Recomendo!','2018-08-10',7,12);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,3,'cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit','2018-08-10',17,3);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,2,'The iPhone X was a huge gamble from Apple, yet one that really paid off six months into our testing. Losing the home button and altering the design was a dangerous move, but one that was sorely needed after years of similarity','2018-08-10',1,10);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,3,'accumsan neque et nunc. Quisque ornare tortor at risus. Nunc ac sem ut dolor dapibus','2018-05-10',14,19);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,4,'ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at,','2018-05-10',18,6);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,4,'Rapido com uma duração de bateria que mete no bolso s9 e iphone X. Uma camera inigualável. Equipamento super bem construído e ainda com oferta de uma capa de silicone na caixa. Samsung nunca mais.','2018-08-10',3,6);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,5,'Melhor que S9 e iPhone X e a metade do preço... só chegam agora a Portugal, mas já compro desta marca há 6 anos!','2018-08-10',5,2);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,5,'Gostei, muito bom.','2018-08-10',5,10);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,2,'Ainda bem que chegou a Portugal mas ainda está muito caro','2018-08-10',5,13);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,4,'Comprei-o há cerca de 15 dias e até agora excedeu as minhas expectativas, no tocante, por exemplo, à autonomia da bateria e a resolução das câmaras fotográficas.','2018-08-10',7,14);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,4,'A marca Lenovo está mesmo a destacar-se no mercado','2018-08-10',9,14);
INSERT INTO review (id,score,comment,date,id_product,id_user) VALUES (DEFAULT,4,'Muito bom na relação qualidade/preço','2018-08-10',9,4);



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

INSERT INTO "featured_product" (id,date) VALUES (DEFAULT,'2018-04-03');
INSERT INTO "featured_product" (id,date) VALUES (DEFAULT,'2018-04-03');
INSERT INTO "featured_product" (id,date) VALUES (DEFAULT,'2018-04-03');
INSERT INTO "featured_product" (id,date) VALUES (DEFAULT,'2018-04-03');

INSERT INTO "single_featured_product" (id_product,id_featured_product) VALUES (2,1);
INSERT INTO "single_featured_product" (id_product,id_featured_product) VALUES (3,2);
INSERT INTO "single_featured_product" (id_product,id_featured_product) VALUES (13,3);
INSERT INTO "single_featured_product" (id_product,id_featured_product) VALUES (5,4);


-- CREATE FUNCTION delivey_date() RETURNS TRIGGER AS
-- $BODY$
-- BEGIN
--   IF EXISTS (SELECT * FROM review WHERE NEW.delivery_date <= CURRENT_TIMESTAMP) THEN
--     RAISE EXCEPTION 'The delivery date must be after the actual date';
--   END IF;
--   RETURN NEW;
-- END
-- $BODY$
-- LANGUAGE plpgsql;
--
-- CREATE TRIGGER delivery_date
--   BEFORE INSERT ON "order"
--   FOR EACH ROW
--     EXECUTE PROCEDURE delivey_date();
-- CREATE FUNCTION review_product() RETURNS TRIGGER AS
-- $BODY$
-- BEGIN
--   IF EXISTS (SELECT * FROM review WHERE NEW.id_user = id_user AND NEW.id_product = id_product) THEN
--     RAISE EXCEPTION 'An user can only make one review per product';
--   END IF;
--   RETURN NEW;
-- END
-- $BODY$
-- LANGUAGE plpgsql;
--
-- CREATE FUNCTION update_history() RETURNS TRIGGER AS
-- $BODY$
-- BEGIN
--   INSERT INTO single_history_product (id_history_product, id_product)
-- SELECT NEW.id, date, description, price FROM history_product WHERE NEW.id = history_product.id;
--   RETURN NEW;
-- END
-- $BODY$
-- LANGUAGE plpgsql;

-- CREATE TRIGGER update_history
--   AFTER INSERT ON history_product
--   FOR EACH ROW
--     EXECUTE PROCEDURE update_history();
--
-- CREATE FUNCTION insert_single_featured_product() RETURNS TRIGGER AS
-- $BODY$
-- BEGIN
--   INSERT INTO single_featured_product (id_product, id_featured_product)
-- SELECT NEW.id, date FROM featured_product WHERE NEW.id = featured_product.id;
--   RETURN NEW;
-- END
-- $BODY$
-- LANGUAGE plpgsql;
--
-- CREATE TRIGGER insert_single_featured_products
--   AFTER INSERT ON featured_product
--   FOR EACH ROW
--     EXECUTE PROCEDURE insert_single_featured_product();

-- CREATE FUNCTION update_score_product()
-- RETURNS trigger AS
-- $$
-- BEGIN
-- UPDATE product SET score = (SELECT AVG(score) FROM review WHERE review.id_product=product.id)  WHERE product.id = NEW.id_product;
-- RETURN NEW;
-- END
-- $$ LANGUAGE plpgsql;

CREATE TRIGGER update_each_score
AFTER INSERT ON review
FOR EACH ROW
EXECUTE PROCEDURE update_score_product();


CREATE INDEX search_idx ON product USING GIST (to_tsvector('english', name));
CREATE INDEX order_delivery_date ON "order" USING btree (delivery_date);
CREATE INDEX email_user ON "user" USING hash (email);


--FTS - body
ALTER TABLE product ADD COLUMN textsearchable_name_col tsvector;
UPDATE product SET textsearchable_name_col = to_tsvector('portuguese', name || ' ' || description);

ALTER TABLE "user" ADD COLUMN textsearch_name_col tsvector;
UPDATE "user" SET textsearch_name_col = to_tsvector('english', username );

-- "SELECT * from product
-- WHERE textsearchable_name_col @@ plainto_tsquery('english',?)
-- ORDER BY name DESC LIMIT 20"
