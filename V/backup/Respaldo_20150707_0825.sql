
--


DROP TABLE IF EXISTS bien CASCADE;
CREATE TABLE bien (
id_bien int4 NOT NULL,
id_concepto int4
);

INSERT INTO bien VALUES ('53','1');

INSERT INTO bien VALUES ('54','3');

INSERT INTO bien VALUES ('55','7');

INSERT INTO bien VALUES ('56','1');

INSERT INTO bien VALUES ('57','7');
ALTER TABLE ONLY  bien  ADD CONSTRAINT  bien_pkey  PRIMARY KEY  (id_bien);

--


DROP TABLE IF EXISTS bien_activo CASCADE;
CREATE TABLE bien_activo (
id_bien int4,
id_seccion int4,
id_responsable_uso varchar(20) NOT NULL
);

INSERT INTO bien_activo VALUES ('56','1','16');

INSERT INTO bien_activo VALUES ('53','12','16');

INSERT INTO bien_activo VALUES ('57','1','16');

--
DROP SEQUENCE IF EXISTS bien_compuesto_id_bien_compuesto_seq CASCADE;
--
CREATE SEQUENCE bien_compuesto_id_bien_compuesto_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 8 CACHE 1 ;

--


DROP TABLE IF EXISTS bien_compuesto CASCADE;
CREATE TABLE bien_compuesto (
id_bien_compuesto int4 NOT NULL DEFAULT nextval('bien_compuesto_id_bien_compuesto_seq'::regclass),
id_bien_componente int4,
id_bien int4
);

INSERT INTO bien_compuesto VALUES ('2','54','55');
ALTER TABLE ONLY  bien_compuesto  ADD CONSTRAINT  bien_compuesto_pkey  PRIMARY KEY  (id_bien_compuesto);

--
DROP SEQUENCE IF EXISTS bitacora_id_bitacora_seq CASCADE;
--
CREATE SEQUENCE bitacora_id_bitacora_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 184 CACHE 1 ;

--


DROP TABLE IF EXISTS bitacora CASCADE;
CREATE TABLE bitacora (
id_bitacora int4 NOT NULL DEFAULT nextval('bitacora_id_bitacora_seq'::regclass),
nombre_tabla varchar(50),
tipo_operacion varchar(100),
fecha varchar(50),
hora varchar(50),
id_usuario int4,
viejo_valor varchar(200),
nuevo_valor varchar(200)
);

INSERT INTO bitacora VALUES ('1','entidad_propietaria','Inclusi髇','2015-04-10','20:25:02.648','7','VACIO','(7,asdasd)');

INSERT INTO bitacora VALUES ('2','entidad_propietaria','Eliminaci髇','2015-04-10','20:27:31.381','7','(7,asdasd)','VACIO');

INSERT INTO bitacora VALUES ('3','entidad_propietaria','Modificaci髇','2015-04-10','20:29:22.551','7','(4,asd)','(4,asdadas)');

INSERT INTO bitacora VALUES ('4','entidad_propietaria','Inclusi髇','2015-04-10','21:26:17.437','7','VACIO','(9,Soporte)');

INSERT INTO bitacora VALUES ('5','cargo','Inclusi髇','2015-04-10','22:53:40.16','7','VACIO','(41,Obrero)');

INSERT INTO bitacora VALUES ('6','cargo','Modificaci髇','2015-04-10','22:54:03.088','7','(41,Obrero)','(41,Obrera)');

INSERT INTO bitacora VALUES ('7','cargo','Eliminaci髇','2015-04-10','22:54:17.416','7','(41,Obrera)','VACIO');

INSERT INTO bitacora VALUES ('8','seccion','Inclusi髇','2015-04-10','22:59:49.741','7','VACIO','(13,"Soporte Tecnico",9,456789)');

INSERT INTO bitacora VALUES ('9','seccion','Modificaci髇','2015-04-10','23:00:12.583','7','(13,"Soporte Tecnico",9,456789)','(13,"Soporte Tecnica",9,456789)');

INSERT INTO bitacora VALUES ('10','seccion','Eliminaci髇','2015-04-10','23:00:23.055','7','(13,"Soporte Tecnica",9,456789)','VACIO');

INSERT INTO bitacora VALUES ('11','grupo','Inclusi髇','2015-04-10','23:07:01.18','7','VACIO','(7,qwe,1234)');

INSERT INTO bitacora VALUES ('12','grupo','Modificaci髇','2015-04-10','23:07:25.524','7','(7,qwe,1234)','(7,qweqwe,1234)');

INSERT INTO bitacora VALUES ('13','grupo','Modificaci髇','2015-04-10','23:07:35.591','7','(7,qweqwe,1234)','(7,qweqweqwe,12341234)');

INSERT INTO bitacora VALUES ('14','grupo','Eliminaci髇','2015-04-10','23:07:51.766','7','(7,qweqweqwe,12341234)','VACIO');

INSERT INTO bitacora VALUES ('15','subgrupo','Inclusi髇','2015-04-10','23:13:16.33','7','VACIO','(7,QWE,1,"")');

INSERT INTO bitacora VALUES ('16','subgrupo','Eliminaci髇','2015-04-10','23:14:39.528','7','(7,QWE,1,"")','VACIO');

INSERT INTO bitacora VALUES ('17','subgrupo','Inclusi髇','2015-04-10','23:14:53.518','7','VACIO','(8,QWE,1,"")');

INSERT INTO bitacora VALUES ('18','subgrupo','Eliminaci髇','2015-04-10','23:15:03.204','7','(8,QWE,1,"")','VACIO');

INSERT INTO bitacora VALUES ('19','subgrupo','Inclusi髇','2015-04-10','23:15:33.033','7','VACIO','(9,QWE,2,"")');

INSERT INTO bitacora VALUES ('20','subgrupo','Eliminaci髇','2015-04-10','23:16:45.594','7','(9,QWE,2,"")','VACIO');

INSERT INTO bitacora VALUES ('21','subgrupo','Inclusi髇','2015-04-10','23:16:55.193','7','VACIO','(10,SAD,1,"")');

INSERT INTO bitacora VALUES ('22','subgrupo','Inclusi髇','2015-04-10','23:19:06.527','7','VACIO','(11,RRR,2,"")');

INSERT INTO bitacora VALUES ('23','concepto_de_movimiento','Inclusi髇','2015-04-10','23:24:39.286','7','VACIO','(5,Regalo,10)');

INSERT INTO bitacora VALUES ('24','concepto_de_movimiento','Modificaci髇','2015-04-10','23:24:52.637','7','(5,Regalo,10)','(5,Regala,11)');

INSERT INTO bitacora VALUES ('25','concepto_de_movimiento','Eliminaci髇','2015-04-10','23:25:03.476','7','(5,Regala,11)','VACIO');

INSERT INTO bitacora VALUES ('26','entidad_propietaria','Inclusi髇','2015-04-11','15:24:53.499','7','VACIO','(10,Entidad)');

INSERT INTO bitacora VALUES ('27','entidad_propietaria','Eliminaci髇','2015-04-11','15:29:12.555','7','(10,Entidad)','VACIO');

INSERT INTO bitacora VALUES ('28','entidad_propietaria','Inclusi髇','2015-04-11','15:29:16.822','7','VACIO','(11,Entidad)');

INSERT INTO bitacora VALUES ('29','entidad_propietaria','Eliminaci髇','2015-04-11','15:29:56.689','7','(11,Entidad)','VACIO');

INSERT INTO bitacora VALUES ('30','entidad_propietaria','Inclusi髇','2015-04-11','15:30:02.36','7','VACIO','(12,Entidad)');

INSERT INTO bitacora VALUES ('31','entidad_propietaria','Inclusi髇','2015-04-11','15:33:40.288','7','VACIO','(13,asd)');

INSERT INTO bitacora VALUES ('32','entidad_propietaria','Inclusi髇','2015-04-11','15:36:35.587','7','VACIO','(14,saas)');

INSERT INTO bitacora VALUES ('33','entidad_propietaria','Eliminaci髇','2015-04-11','15:36:38.779','7','(13,asd)','VACIO');

INSERT INTO bitacora VALUES ('34','entidad_propietaria','Eliminaci髇','2015-04-11','15:36:42.68','7','(4,asdadas)','VACIO');

INSERT INTO bitacora VALUES ('35','entidad_propietaria','Eliminaci髇','2015-04-11','15:36:47.665','7','(14,saas)','VACIO');

INSERT INTO bitacora VALUES ('36','entidad_propietaria','Inclusi髇','2015-04-11','15:38:17.629','7','VACIO','(15,asd)');

INSERT INTO bitacora VALUES ('37','entidad_propietaria','Eliminaci髇','2015-04-11','15:38:20.652','7','(15,asd)','VACIO');

INSERT INTO bitacora VALUES ('38','entidad_propietaria','Inclusi髇','2015-04-11','15:39:14.019','7','VACIO','(16,asd)');

INSERT INTO bitacora VALUES ('39','entidad_propietaria','Eliminaci髇','2015-04-11','15:39:16.844','7','(16,asd)','VACIO');

INSERT INTO bitacora VALUES ('40','entidad_propietaria','Inclusi髇','2015-04-11','15:39:25.457','7','VACIO','(17,asd)');

INSERT INTO bitacora VALUES ('41','entidad_propietaria','Eliminaci髇','2015-04-11','15:39:28.468','7','(17,asd)','VACIO');

INSERT INTO bitacora VALUES ('42','entidad_propietaria','Inclusi髇','2015-04-11','15:45:50.599','7','VACIO','(18,asd)');

INSERT INTO bitacora VALUES ('43','entidad_propietaria','Eliminaci髇','2015-04-11','15:46:58.788','7','(18,asd)','VACIO');

INSERT INTO bitacora VALUES ('44','entidad_propietaria','Inclusi髇','2015-04-11','15:47:12.623','7','VACIO','(19,asd)');

INSERT INTO bitacora VALUES ('45','entidad_propietaria','Eliminaci髇','2015-04-11','15:47:16.547','7','(19,asd)','VACIO');

INSERT INTO bitacora VALUES ('46','entidad_propietaria','Inclusi髇','2015-04-11','15:47:48.914','7','VACIO','(20,asdas)');

INSERT INTO bitacora VALUES ('47','entidad_propietaria','Eliminaci髇','2015-04-11','15:47:53.104','7','(20,asdas)','VACIO');

INSERT INTO bitacora VALUES ('48','entidad_propietaria','Inclusi髇','2015-04-11','15:47:57.602','7','VACIO','(21,asd)');

INSERT INTO bitacora VALUES ('49','entidad_propietaria','Eliminaci髇','2015-04-11','15:48:01.249','7','(21,asd)','VACIO');

INSERT INTO bitacora VALUES ('50','entidad_propietaria','Inclusi髇','2015-04-11','15:48:16.917','7','VACIO','(22,ASD)');

INSERT INTO bitacora VALUES ('51','entidad_propietaria','Eliminaci髇','2015-04-11','15:48:25.327','7','(22,ASD)','VACIO');

INSERT INTO bitacora VALUES ('52','entidad_propietaria','Inclusi髇','2015-04-11','15:51:45.239','7','VACIO','(23,success)');

INSERT INTO bitacora VALUES ('53','entidad_propietaria','Eliminaci髇','2015-04-11','15:51:50.569','7','(23,success)','VACIO');

INSERT INTO bitacora VALUES ('54','entidad_propietaria','Inclusi髇','2015-04-11','15:57:37.562','7','VACIO','(24,qwe)');

INSERT INTO bitacora VALUES ('55','entidad_propietaria','Inclusi髇','2015-04-11','15:58:18.614','7','VACIO','(25,asd)');

INSERT INTO bitacora VALUES ('56','entidad_propietaria','Inclusi髇','2015-04-11','15:58:40.96','7','VACIO','(26,qweqwe)');

INSERT INTO bitacora VALUES ('57','entidad_propietaria','Eliminaci髇','2015-04-11','15:58:44.251','7','(25,asd)','VACIO');

INSERT INTO bitacora VALUES ('58','entidad_propietaria','Eliminaci髇','2015-04-11','15:58:48.637','7','(24,qwe)','VACIO');

INSERT INTO bitacora VALUES ('59','entidad_propietaria','Eliminaci髇','2015-04-11','15:58:52.991','7','(26,qweqwe)','VACIO');

INSERT INTO bitacora VALUES ('60','entidad_propietaria','Inclusi髇','2015-04-11','15:59:07.502','7','VACIO','(27,asdasd)');

INSERT INTO bitacora VALUES ('61','entidad_propietaria','Eliminaci髇','2015-04-11','15:59:11.725','7','(27,asdasd)','VACIO');

INSERT INTO bitacora VALUES ('62','grupo','Eliminaci髇','2015-04-11','17:09:48.369','7','(3,a,03)','VACIO');

INSERT INTO bitacora VALUES ('63','concepto_de_movimiento','Modificaci髇','2015-04-13','01:32:27.365','7','(2,Venta,11)','(2,Ventaa,11)');

INSERT INTO bitacora VALUES ('64','grupo','Modificaci髇','2015-04-13','01:48:57.581','7','(2,Estantes,)','(2,Estantes,298)');

INSERT INTO bitacora VALUES ('65','grupo','Eliminaci髇','2015-04-13','04:46:25.69','7','(5,Codigos,03)','VACIO');

INSERT INTO bitacora VALUES ('66','grupo','Eliminaci髇','2015-04-13','04:46:31.073','7','(6,Grupo,123456)','VACIO');

INSERT INTO bitacora VALUES ('67','grupo','Modificaci髇','2015-04-13','04:46:38.086','7','(1,Maquinas,)','(1,Maquinas,56)');

INSERT INTO bitacora VALUES ('68','VACIO','Inicio de Sesi髇','2015-04-14','00:57:08','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('69','VACIO','Inicio de Sesi髇','2015-04-15','01:17:17','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('70','concepto_de_movimiento','Inclusi髇','2015-04-15','03:10:25.84','7','VACIO','(6,Flotante,14)');

INSERT INTO bitacora VALUES ('71','VACIO','Inicio de Sesi髇','2015-04-22','06:37:43','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('72','grupo','Modificaci髇','2015-04-22','05:38:55.696','7','(1,Maquinas,56)','(1,Estantes,56)');

INSERT INTO bitacora VALUES ('73','grupo','Modificaci髇','2015-04-22','05:39:32.546','7','(1,Estantes,56)','(1,Maquinas,56)');

INSERT INTO bitacora VALUES ('74','grupo','Modificaci髇','2015-04-22','06:02:02.596','7','(1,Maquinas,56)','(1,Maquinasasdasd,563)');

INSERT INTO bitacora VALUES ('75','grupo','Modificaci髇','2015-04-22','06:15:24.534','7','(1,Maquinasasdasd,563)','(1,Maquinas,563)');

INSERT INTO bitacora VALUES ('76','grupo','Modificaci髇','2015-04-22','06:19:11.209','7','(1,Maquinas,563)','(1,Maquinas,68)');

INSERT INTO bitacora VALUES ('77','subgrupo','Modificaci髇','2015-04-22','06:21:52.285','7','(5,sad,1,"")','(5,Cels,1,13)');

INSERT INTO bitacora VALUES ('78','subgrupo','Modificaci髇','2015-04-22','06:22:08.639','7','(5,Cels,1,13)','(5,Cels,1,28)');

INSERT INTO bitacora VALUES ('79','subgrupo','Modificaci髇','2015-04-22','06:22:21.687','7','(5,Cels,1,28)','(5,Cels,1,5)');

INSERT INTO bitacora VALUES ('80','subgrupo','Modificaci髇','2015-04-22','06:22:41.225','7','(5,Cels,1,5)','(5,Celse,1,165)');

INSERT INTO bitacora VALUES ('81','subgrupo','Eliminaci髇','2015-04-22','06:22:45.112','7','(5,Celse,1,165)','VACIO');

INSERT INTO bitacora VALUES ('82','subgrupo','Modificaci髇','2015-04-22','06:22:50.126','7','(3,Cels,1,"")','(3,Cels,1,23)');

INSERT INTO bitacora VALUES ('83','subgrupo','Modificaci髇','2015-04-22','06:35:49.191','7','(11,RRR,2,"")','(11,RRR,2,23)');

INSERT INTO bitacora VALUES ('84','subgrupo','Modificaci髇','2015-04-22','06:35:55.389','7','(10,SAD,1,"")','(10,SAD,1,123)');

INSERT INTO bitacora VALUES ('85','subgrupo','Modificaci髇','2015-04-22','06:36:01.103','7','(4,Aires,1,"")','(4,Aires,1,12413)');

INSERT INTO bitacora VALUES ('86','subgrupo','Modificaci髇','2015-04-22','06:36:06.462','7','(6,Camaras,1,"")','(6,Camaras,1,12431)');

INSERT INTO bitacora VALUES ('87','subgrupo','Eliminaci髇','2015-04-22','06:36:11.279','7','(10,SAD,1,123)','VACIO');

INSERT INTO bitacora VALUES ('88','subgrupo','Eliminaci髇','2015-04-22','06:36:17.77','7','(11,RRR,2,23)','VACIO');

INSERT INTO bitacora VALUES ('89','subgrupo','Eliminaci髇','2015-04-22','06:36:21.379','7','(3,Cels,1,23)','VACIO');

INSERT INTO bitacora VALUES ('90','subgrupo','Modificaci髇','2015-04-22','06:36:27.591','7','(4,Aires,1,12413)','(4,Aires,1,1)');

INSERT INTO bitacora VALUES ('91','subgrupo','Modificaci髇','2015-04-22','06:36:36.172','7','(6,Camaras,1,12431)','(6,Camaras,1,2)');

INSERT INTO bitacora VALUES ('92','subgrupo','Modificaci髇','2015-04-22','06:36:47.341','7','(2,Mesasa,3,123132)','(2,Mesas,2,3)');

INSERT INTO bitacora VALUES ('93','concepto_de_movimiento','Modificaci髇','2015-04-22','06:41:45.759','7','(2,Ventaa,11)','(2,Venta,11)');

INSERT INTO bitacora VALUES ('94','concepto_de_movimiento','Modificaci髇','2015-04-22','06:47:29.527','7','(6,Flotante,14)','(6,Flotante,11)');

INSERT INTO bitacora VALUES ('95','concepto_de_movimiento','Modificaci髇','2015-04-22','06:47:34.509','7','(6,Flotante,11)','(6,Flotante,14)');

INSERT INTO bitacora VALUES ('96','concepto_de_movimiento','Modificaci髇','2015-04-22','06:47:39.494','7','(6,Flotante,14)','(6,Flotantea,14)');

INSERT INTO bitacora VALUES ('97','concepto_de_movimiento','Modificaci髇','2015-04-22','06:47:45.053','7','(6,Flotantea,14)','(6,Flotantea,11)');

INSERT INTO bitacora VALUES ('98','concepto_de_movimiento','Modificaci髇','2015-04-22','06:47:50.661','7','(6,Flotantea,11)','(6,Flotante,14)');

INSERT INTO bitacora VALUES ('99','VACIO','Inicio de Sesi髇','2015-05-12','09:07:47','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('100','VACIO','Inicio de Sesi髇','2015-05-13','06:48:47','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('101','VACIO','Inicio de Sesi髇','2015-05-20','05:34:37','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('102','VACIO','Inicio de Sesi髇','2015-05-24','02:28:36','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('103','VACIO','Inicio de Sesi髇','2015-05-25','06:24:02','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('104','VACIO','Inicio de Sesi髇','2015-05-26','06:11:38','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('105','VACIO','Inicio de Sesi髇','2015-05-26','06:13:07','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('106','subgrupo','Inclusi髇','2015-06-11','01:10:09.542','7','VACIO','(12,"","","")');

INSERT INTO bitacora VALUES ('107','subgrupo','Eliminaci髇','2015-06-11','02:14:36.18','7','(12,"","","")','VACIO');

INSERT INTO bitacora VALUES ('108','subgrupo','Modificaci髇','2015-06-11','02:14:44.82','7','(2,Mesas,2,3)','(2,Mesass,2,3)');

INSERT INTO bitacora VALUES ('109','VACIO','Inicio de Sesi髇','2015-06-11','09:05:10','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('110','VACIO','Inicio de Sesi髇','2015-06-11','10:07:04','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('111','VACIO','Inicio de Sesi髇','2015-06-12','05:00:50','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('112','VACIO','Inicio de Sesi髇','2015-06-13','05:58:01','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('113','VACIO','Inicio de Sesi髇','2015-06-13','06:43:54','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('114','VACIO','Inicio de Sesi髇','2015-06-13','06:44:57','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('115','VACIO','Inicio de Sesi髇','2015-06-13','06:50:54','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('116','VACIO','Inicio de Sesi髇','2015-06-13','07:50:06','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('117','VACIO','Inicio de Sesi髇','2015-06-13','08:25:05','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('118','VACIO','Inicio de Sesi髇','2015-06-16','05:34:42','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('119','cargo','Inclusi髇','2015-06-16','05:56:27.407','7','VACIO','(42,asdad)');

INSERT INTO bitacora VALUES ('120','proveedor','Inclusi髇','2015-06-16','06:03:09.555','7','VACIO','(5,23123123,nacional,asdasd,123131,asdasasd)');

INSERT INTO bitacora VALUES ('121','proveedor','Modificaci髇','2015-06-16','06:05:06.707','7','(5,23123123,nacional,asdasd,123131,asdasasd)','(5,qeqweqweqwe,nacional,asdasd,123131,asdasasd)');

INSERT INTO bitacora VALUES ('122','proveedor','Eliminaci髇','2015-06-16','06:05:25.861','7','(5,qeqweqweqwe,nacional,asdasd,123131,asdasasd)','VACIO');

INSERT INTO bitacora VALUES ('123','entidad_propietaria','Modificaci髇','2015-06-16','06:12:41.518','7','(1,Bien)','(1,Bienes)');

INSERT INTO bitacora VALUES ('124','sub_categoria_especifica','Inclusi髇','2015-06-16','06:17:42.091','7','VACIO','(10,asdasd,4,23123123)');

INSERT INTO bitacora VALUES ('125','sub_categoria_especifica','Modificaci髇','2015-06-16','06:17:48.155','7','(10,asdasd,4,23123123)','(10,asdasd,4,2312312323123)');

INSERT INTO bitacora VALUES ('126','sub_categoria_especifica','Eliminaci髇','2015-06-16','06:17:53.529','7','(10,asdasd,4,2312312323123)','VACIO');

INSERT INTO bitacora VALUES ('127','VACIO','Inicio de Sesi髇','2015-06-16','07:18:43','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('128','proveedor','Inclusi髇','2015-06-16','00:49:09.621','7','VACIO','(6,asdadad,internacional,adasd,12312312,adad)');

INSERT INTO bitacora VALUES ('129','VACIO','Inicio de Sesi髇','2015-06-16','08:06:26','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('130','VACIO','Inicio de Sesi髇','2015-06-16','08:25:55','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('131','VACIO','Inicio de Sesi髇','2015-06-16','08:46:14','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('132','VACIO','Inicio de Sesi髇','2015-06-16','09:30:31','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('133','VACIO','Inicio de Sesi髇','2015-06-16','09:46:05','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('134','VACIO','Inicio de Sesi髇','2015-06-25','07:53:05','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('135','VACIO','Inicio de Sesi髇','2015-06-25','08:19:21','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('136','VACIO','Inicio de Sesi髇','2015-06-25','08:30:12','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('137','VACIO','Inicio de Sesi髇','2015-06-25','13:06:02','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('138','subgrupo','Modificaci髇','2015-06-25','06:45:45.553','7','(4,Aires,1,)','(4,Aires,1,2)');

INSERT INTO bitacora VALUES ('139','subgrupo','Modificaci髇','2015-06-25','06:45:49.782','7','(2,Mesass,3,)','(2,Mesass,3,2)');

INSERT INTO bitacora VALUES ('140','subgrupo','Modificaci髇','2015-06-25','06:46:50.953','7','(6,Camaras,2,)','(6,Camaras,2,1)');

INSERT INTO bitacora VALUES ('141','VACIO','Inicio de Sesi髇','2015-06-25','14:03:36','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('142','VACIO','Inicio de Sesi髇','2015-06-25','14:17:09','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('143','VACIO','Inicio de Sesi髇','2015-06-25','14:35:12','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('144','VACIO','Inicio de Sesi髇','2015-06-25','15:23:34','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('145','VACIO','Inicio de Sesi髇','2015-06-25','15:53:13','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('146','VACIO','Inicio de Sesi髇','2015-06-25','16:03:50','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('147','VACIO','Inicio de Sesi髇','2015-06-26','03:06:28','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('148','VACIO','Inicio de Sesi髇','2015-06-26','18:43:39','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('149','VACIO','Inicio de Sesi髇','2015-06-26','21:29:38','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('150','VACIO','Inicio de Sesi髇','2015-06-28','03:16:11','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('151','VACIO','Inicio de Sesi髇','2015-06-28','03:33:38','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('152','VACIO','Inicio de Sesi髇','2015-06-28','06:43:04','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('153','VACIO','Inicio de Sesi髇','2015-06-28','08:00:04','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('154','VACIO','Inicio de Sesi髇','2015-06-28','09:30:29','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('155','VACIO','Inicio de Sesi髇','2015-06-28','20:30:37','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('156','VACIO','Inicio de Sesi髇','2015-06-28','21:27:42','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('157','VACIO','Inicio de Sesi髇','2015-06-28','21:55:16','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('158','VACIO','Inicio de Sesi髇','2015-06-30','04:42:59','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('159','VACIO','Inicio de Sesi髇','2015-06-30','05:00:27','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('160','VACIO','Inicio de Sesi髇','2015-06-30','23:28:56','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('161','VACIO','Inicio de Sesi髇','2015-06-30','23:45:58','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('162','VACIO','Inicio de Sesi髇','2015-07-01','00:09:39','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('163','VACIO','Inicio de Sesi髇','2015-07-01','00:35:01','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('164','VACIO','Inicio de Sesi髇','2015-07-02','18:12:00','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('165','proveedor','Inclusi髇','2015-07-02','21:07:05.469185','7','VACIO','(7,85459565,internacional,"Proveedores de maquinas",19254856,Interprov)');

INSERT INTO bitacora VALUES ('166','VACIO','Inicio de Sesi髇','2015-07-02','18:53:37','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('167','VACIO','Inicio de Sesi髇','2015-07-02','19:10:45','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('168','VACIO','Inicio de Sesi髇','2015-07-02','19:29:35','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('169','VACIO','Inicio de Sesi髇','2015-07-03','20:12:09','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('170','VACIO','Inicio de Sesi髇','2015-07-03','20:34:06','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('171','VACIO','Inicio de Sesi髇','2015-07-04','08:02:17','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('172','concepto_de_movimiento','Inclusi髇','2015-07-04','06:13:41.825','7','VACIO','(7,"Faltante por Investigar",15)');

INSERT INTO bitacora VALUES ('173','VACIO','Inicio de Sesi髇','2015-07-07','06:37:35','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('174','VACIO','Inicio de Sesi髇','2015-07-07','07:05:46','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('175','VACIO','Inicio de Sesi髇','2015-07-07','09:13:00','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('176','VACIO','Inicio de Sesi髇','2015-07-07','09:55:57','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('177','VACIO','Inicio de Sesi髇','2015-07-07','10:19:53','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('178','VACIO','Inicio de Sesi髇','2015-07-07','10:27:07','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('179','VACIO','Inicio de Sesi髇','2015-07-07','10:54:13','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('180','VACIO','Inicio de Sesi髇','2015-07-07','11:47:18','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('182','VACIO','Inicio de Sesi髇','2015-07-07','08:14:58','7','VACIO','VACIO');

INSERT INTO bitacora VALUES ('183','concepto_de_movimiento','Inclusi贸n','2015-07-07','11:06:15.168338','7','VACIO','(12,Intercambio,10)');
ALTER TABLE ONLY  bitacora  ADD CONSTRAINT  bitacora_pkey  PRIMARY KEY  (id_bitacora);

--
DROP SEQUENCE IF EXISTS cargo_id_cargo_seq CASCADE;
--
CREATE SEQUENCE cargo_id_cargo_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 48 CACHE 1 ;

--


DROP TABLE IF EXISTS cargo CASCADE;
CREATE TABLE cargo (
id_cargo int4 NOT NULL DEFAULT nextval('cargo_id_cargo_seq'::regclass),
nombre_cargo varchar(25) NOT NULL
);

INSERT INTO cargo VALUES ('18','Asistente de Bienes');

INSERT INTO cargo VALUES ('17','Supervisora de Bienes');

INSERT INTO cargo VALUES ('42','asdad');
ALTER TABLE ONLY  cargo  ADD CONSTRAINT  cargo_pkey  PRIMARY KEY  (id_cargo);

--
DROP SEQUENCE IF EXISTS concepto_de_movimiento_id_concepto_seq CASCADE;
--
CREATE SEQUENCE concepto_de_movimiento_id_concepto_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 13 CACHE 1 ;

--


DROP TABLE IF EXISTS concepto_de_movimiento CASCADE;
CREATE TABLE concepto_de_movimiento (
id_concepto int4 NOT NULL DEFAULT nextval('concepto_de_movimiento_id_concepto_seq'::regclass),
nombre_concepto varchar(50) NOT NULL,
id_tipo_concepto int4
);

INSERT INTO concepto_de_movimiento VALUES ('1','Compra','10');

INSERT INTO concepto_de_movimiento VALUES ('3','Donaci髇','11');

INSERT INTO concepto_de_movimiento VALUES ('4','Traspaso','10');

INSERT INTO concepto_de_movimiento VALUES ('2','Venta','11');

INSERT INTO concepto_de_movimiento VALUES ('6','Flotante','14');

INSERT INTO concepto_de_movimiento VALUES ('7','Faltante por Investigar','15');

INSERT INTO concepto_de_movimiento VALUES ('12','Intercambio','10');
ALTER TABLE ONLY  concepto_de_movimiento  ADD CONSTRAINT  concepto_de_movimiento_pkey  PRIMARY KEY  (id_concepto);

--
DROP SEQUENCE IF EXISTS datos_bien_id_bien_seq CASCADE;
--
CREATE SEQUENCE datos_bien_id_bien_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 63 CACHE 1 ;

--


DROP TABLE IF EXISTS datos_bien CASCADE;
CREATE TABLE datos_bien (
id_bien int4 NOT NULL DEFAULT nextval('datos_bien_id_bien_seq'::regclass),
nombre_bien varchar(25) NOT NULL,
fecha_adquisicion_bien date NOT NULL,
descripcion_bien varchar(100),
serial_bien varchar(25),
ruta_imagen varchar(100),
ruta_pdf varchar(100),
id_subgrupo int4,
marca_bien varchar(50),
modelo_bien varchar(50),
color_bien varchar(50),
descripcion_bien_individual varchar(100),
id_proveedor varchar(5),
valor_bien int4
);

INSERT INTO datos_bien VALUES ('53','Bien','2015-06-28','asd','asd',NULL,NULL,'4','asd','asd','asd','asd','6','100');

INSERT INTO datos_bien VALUES ('54','Bien','2015-06-28','asd','asd',NULL,NULL,'4','asd','asd','asd','asd','6','100');

INSERT INTO datos_bien VALUES ('55','lente','2015-06-16','kspdngpksdngpskdng','2344',NULL,NULL,'4','lente','lente','negro','dgdsg','6','123');

INSERT INTO datos_bien VALUES ('56','Bien','2015-07-01','asdgsdg','agnp',NULL,NULL,'6','apiegnpisadng','gdspkngpksdnp','nbeho','gkn23pgkn','6','555555');

INSERT INTO datos_bien VALUES ('57','Bien','2015-07-01','asdgsdg','gpkdnsgpn243hgknpkn',NULL,NULL,'6','apiegnpisadng','gdspkngpksdnp','nbeho','pkngpkn423','6','555555');

--
DROP SEQUENCE IF EXISTS datos_personales_id_datos_personales_seq CASCADE;
--
CREATE SEQUENCE datos_personales_id_datos_personales_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 24 CACHE 1 ;

--


DROP TABLE IF EXISTS datos_personales CASCADE;
CREATE TABLE datos_personales (
id_datos_personales int4 NOT NULL DEFAULT nextval('datos_personales_id_datos_personales_seq'::regclass),
nombre varchar(50) NOT NULL,
apellido varchar(50) NOT NULL,
cedula varchar(50) NOT NULL,
sexo varchar(20) NOT NULL,
telefono varchar(11) NOT NULL,
id_cargo int4
);

INSERT INTO datos_personales VALUES ('18','Yoberty','Garcia','24558576','M','04120747965','17');

INSERT INTO datos_personales VALUES ('16','Angel','Saldivia','24797621','F','04269508087','18');
ALTER TABLE ONLY  datos_personales  ADD CONSTRAINT  datos_personales_pkey  PRIMARY KEY  (id_datos_personales);

--
DROP SEQUENCE IF EXISTS entidad_propietaria_id_entidad_propietaria_seq CASCADE;
--
CREATE SEQUENCE entidad_propietaria_id_entidad_propietaria_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 33 CACHE 1 ;

--


DROP TABLE IF EXISTS entidad_propietaria CASCADE;
CREATE TABLE entidad_propietaria (
id_entidad_propietaria int4 NOT NULL DEFAULT nextval('entidad_propietaria_id_entidad_propietaria_seq'::regclass),
nombre_entidad_propietaria varchar(100) NOT NULL
);

INSERT INTO entidad_propietaria VALUES ('3','Informatica');

INSERT INTO entidad_propietaria VALUES ('9','Soporte');

INSERT INTO entidad_propietaria VALUES ('12','Entidad');

INSERT INTO entidad_propietaria VALUES ('1','Bienes');
ALTER TABLE ONLY  entidad_propietaria  ADD CONSTRAINT  entidad_propietaria_pkey  PRIMARY KEY  (id_entidad_propietaria);

--
DROP SEQUENCE IF EXISTS estado_id_estado_seq CASCADE;
--
CREATE SEQUENCE estado_id_estado_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 7 CACHE 1 ;

--


DROP TABLE IF EXISTS estado CASCADE;
CREATE TABLE estado (
nombre_estado varchar(20),
id_estado int4 NOT NULL DEFAULT nextval('estado_id_estado_seq'::regclass)
);
ALTER TABLE ONLY  estado  ADD CONSTRAINT  estado_pkey  PRIMARY KEY  (id_estado);

--
DROP SEQUENCE IF EXISTS funciones_sistema_id_funcion_sistema_seq CASCADE;
--
CREATE SEQUENCE funciones_sistema_id_funcion_sistema_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 15 CACHE 1 ;

--


DROP TABLE IF EXISTS funciones_sistema CASCADE;
CREATE TABLE funciones_sistema (
id_funcion_sistema int4 NOT NULL DEFAULT nextval('funciones_sistema_id_funcion_sistema_seq'::regclass),
nombre_funcion_sistema varchar(25) NOT NULL
);

INSERT INTO funciones_sistema VALUES ('1','gestionar_responsable');

INSERT INTO funciones_sistema VALUES ('2','gestionar_usuario');

INSERT INTO funciones_sistema VALUES ('3','gestionar_departamento');

INSERT INTO funciones_sistema VALUES ('4','gestionar_seccion');

INSERT INTO funciones_sistema VALUES ('5','gestionar_cargo');

INSERT INTO funciones_sistema VALUES ('6','gestionar_grupo');

INSERT INTO funciones_sistema VALUES ('7','gestionar_subgrupo');

INSERT INTO funciones_sistema VALUES ('8','gestionar_concepto');

INSERT INTO funciones_sistema VALUES ('9','gestionar_bd');
ALTER TABLE ONLY  funciones_sistema  ADD CONSTRAINT  funciones_sistema_pkey  PRIMARY KEY  (id_funcion_sistema);

--
DROP SEQUENCE IF EXISTS grupo_id_grupo_seq CASCADE;
--
CREATE SEQUENCE grupo_id_grupo_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 13 CACHE 1 ;

--


DROP TABLE IF EXISTS grupo CASCADE;
CREATE TABLE grupo (
id_grupo int4 NOT NULL DEFAULT nextval('grupo_id_grupo_seq'::regclass),
nombre_grupo varchar(150) NOT NULL,
codigo_grupo varchar(25)
);

INSERT INTO grupo VALUES ('2','Estantes','298');

INSERT INTO grupo VALUES ('1','Maquinas','68');
ALTER TABLE ONLY  grupo  ADD CONSTRAINT  grupo_pkey  PRIMARY KEY  (id_grupo);

--


DROP TABLE IF EXISTS logintry CASCADE;
CREATE TABLE logintry (
intento int4
);

INSERT INTO logintry VALUES ('0');

--
DROP SEQUENCE IF EXISTS mes_id_mes_seq CASCADE;
--
CREATE SEQUENCE mes_id_mes_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 18 CACHE 1 ;

--


DROP TABLE IF EXISTS mes CASCADE;
CREATE TABLE mes (
id_mes int4 NOT NULL DEFAULT nextval('mes_id_mes_seq'::regclass),
nombre_mes varchar(25)
);

INSERT INTO mes VALUES ('1','Enero');

INSERT INTO mes VALUES ('2','Febrero');

INSERT INTO mes VALUES ('3','Marzo');

INSERT INTO mes VALUES ('4','Abril');

INSERT INTO mes VALUES ('5','Mayo');

INSERT INTO mes VALUES ('6','Junio');

INSERT INTO mes VALUES ('7','Julio');

INSERT INTO mes VALUES ('8','Agosto');

INSERT INTO mes VALUES ('9','Septiembre');

INSERT INTO mes VALUES ('10','Octubre');

INSERT INTO mes VALUES ('11','Noviembre');

INSERT INTO mes VALUES ('12','Diciembre');
ALTER TABLE ONLY  mes  ADD CONSTRAINT  mes_pkey  PRIMARY KEY  (id_mes);

--
DROP SEQUENCE IF EXISTS municipio_id_municipio_seq CASCADE;
--
CREATE SEQUENCE municipio_id_municipio_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 7 CACHE 1 ;

--


DROP TABLE IF EXISTS municipio CASCADE;
CREATE TABLE municipio (
id_municipio int4 NOT NULL DEFAULT nextval('municipio_id_municipio_seq'::regclass),
nombre_municipio varchar(30) NOT NULL,
id_estado varchar(10) NOT NULL
);
ALTER TABLE ONLY  municipio  ADD CONSTRAINT  municipio_pkey  PRIMARY KEY  (id_municipio);

--
DROP SEQUENCE IF EXISTS proveedor_id_proveedor_seq CASCADE;
--
CREATE SEQUENCE proveedor_id_proveedor_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 13 CACHE 1 ;

--


DROP TABLE IF EXISTS proveedor CASCADE;
CREATE TABLE proveedor (
id_proveedor int4 NOT NULL DEFAULT nextval('proveedor_id_proveedor_seq'::regclass),
codigo_proveedor varchar(20) NOT NULL,
tipo_proveedor varchar(20) NOT NULL,
descripcion_proveedor varchar(100) NOT NULL,
rif varchar(12) NOT NULL,
otra_descripcion varchar(100) NOT NULL
);

INSERT INTO proveedor VALUES ('6','asdadad','internacional','adasd','12312312','adad');

INSERT INTO proveedor VALUES ('7','85459565','internacional','Proveedores de maquinas','19254856','Interprov');
ALTER TABLE ONLY  proveedor  ADD CONSTRAINT  proveedor_pkey  PRIMARY KEY  (id_proveedor);

--
DROP SEQUENCE IF EXISTS responsable_id_responsable_seq CASCADE;
--
CREATE SEQUENCE responsable_id_responsable_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 12 CACHE 1 ;

--


DROP TABLE IF EXISTS responsable CASCADE;
CREATE TABLE responsable (
id_responsable int4 NOT NULL DEFAULT nextval('responsable_id_responsable_seq'::regclass),
id_entidad_propietaria int4,
id_datos_personales int4
);

INSERT INTO responsable VALUES ('4','3','16');

INSERT INTO responsable VALUES ('6','1','18');
ALTER TABLE ONLY  responsable  ADD CONSTRAINT  responsable_pkey  PRIMARY KEY  (id_responsable);

--
DROP SEQUENCE IF EXISTS seccion_id_seccion_seq CASCADE;
--
CREATE SEQUENCE seccion_id_seccion_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 19 CACHE 1 ;

--


DROP TABLE IF EXISTS seccion CASCADE;
CREATE TABLE seccion (
id_seccion int4 NOT NULL DEFAULT nextval('seccion_id_seccion_seq'::regclass),
nombre_seccion varchar(25),
id_entidad_propietaria int4,
codigo_seccion varchar(5) NOT NULL
);

INSERT INTO seccion VALUES ('1','Bienes Muebles','1','122');

INSERT INTO seccion VALUES ('12','Recursos Humanos','3','0001');
ALTER TABLE ONLY  seccion  ADD CONSTRAINT  seccion_pkey  PRIMARY KEY  (id_seccion);

--
DROP SEQUENCE IF EXISTS sub_categoria_especifica_id_sub_categoria_especifica_seq CASCADE;
--
CREATE SEQUENCE sub_categoria_especifica_id_sub_categoria_especifica_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 16 CACHE 1 ;

--


DROP TABLE IF EXISTS sub_categoria_especifica CASCADE;
CREATE TABLE sub_categoria_especifica (
id_sub_categoria_especifica int4 NOT NULL DEFAULT nextval('sub_categoria_especifica_id_sub_categoria_especifica_seq'::regclass),
nombre_sub_categoria_especifica varchar(50),
id_subgrupo varchar(50),
codigo_sub_categoria_especifica varchar(50)
);

INSERT INTO sub_categoria_especifica VALUES ('7','asd','6','12312');

--
DROP SEQUENCE IF EXISTS subgrupo_id_subgrupo_seq CASCADE;
--
CREATE SEQUENCE subgrupo_id_subgrupo_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 18 CACHE 1 ;

--


DROP TABLE IF EXISTS subgrupo CASCADE;
CREATE TABLE subgrupo (
id_subgrupo int4 NOT NULL DEFAULT nextval('subgrupo_id_subgrupo_seq'::regclass),
nombre_subgrupo varchar(150) NOT NULL,
codigo_subgrupo varchar(25) NOT NULL,
id_grupo int4
);

INSERT INTO subgrupo VALUES ('4','Aires','1','2');

INSERT INTO subgrupo VALUES ('2','Mesass','3','2');

INSERT INTO subgrupo VALUES ('6','Camaras','2','1');
ALTER TABLE ONLY  subgrupo  ADD CONSTRAINT  subgrupo_pkey  PRIMARY KEY  (id_subgrupo);

--


DROP TABLE IF EXISTS tipo_concepto CASCADE;
CREATE TABLE tipo_concepto (
id_tipo_concepto int4 NOT NULL,
nombre_tipo_concepto varchar(25) NOT NULL
);

INSERT INTO tipo_concepto VALUES ('10','Incorporaci髇');

INSERT INTO tipo_concepto VALUES ('11','Desincorporaci髇');

INSERT INTO tipo_concepto VALUES ('14','Flotante sin Incorporar');

INSERT INTO tipo_concepto VALUES ('15','Faltante por Investigar');
ALTER TABLE ONLY  tipo_concepto  ADD CONSTRAINT  tipo_concepto_pkey  PRIMARY KEY  (id_tipo_concepto);

--
DROP SEQUENCE IF EXISTS transaccion_id_transaccion_seq CASCADE;
--
CREATE SEQUENCE transaccion_id_transaccion_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 23 CACHE 1 ;

--


DROP TABLE IF EXISTS transaccion CASCADE;
CREATE TABLE transaccion (
id_transaccion int4 NOT NULL DEFAULT nextval('transaccion_id_transaccion_seq'::regclass),
fecha_transaccion date NOT NULL,
id_tipo_concepto int4,
id_bien int4
);

INSERT INTO transaccion VALUES ('13','2015-06-28','10','53');

INSERT INTO transaccion VALUES ('14','2015-06-28','10','54');

INSERT INTO transaccion VALUES ('15','2015-06-28','11','54');

INSERT INTO transaccion VALUES ('16','2015-06-30','10','56');

INSERT INTO transaccion VALUES ('17','2015-06-30','10','57');
ALTER TABLE ONLY  transaccion  ADD CONSTRAINT  transaccion_pkey  PRIMARY KEY  (id_transaccion);

--
DROP SEQUENCE IF EXISTS usuario_id_usuario_seq CASCADE;
--
CREATE SEQUENCE usuario_id_usuario_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 21 CACHE 1 ;

--


DROP TABLE IF EXISTS usuario CASCADE;
CREATE TABLE usuario (
id_usuario int4 NOT NULL DEFAULT nextval('usuario_id_usuario_seq'::regclass),
usuario varchar(25),
contrasena varchar(25),
gestionar_responsable varchar(25),
gestionar_usuario varchar(25),
gestionar_departamento varchar(25),
gestionar_seccion varchar(25),
gestionar_cargo varchar(25),
gestionar_grupo varchar(25),
gestionar_subgrupo varchar(25),
gestionar_concepto varchar(25),
gestionar_bd varchar(25)
);

INSERT INTO usuario VALUES ('7','admin','admin','TRUE','TRUE','TRUE','TRUE','TRUE','TRUE','TRUE','TRUE','TRUE');
ALTER TABLE ONLY  usuario  ADD CONSTRAINT  usuario_pkey  PRIMARY KEY  (id_usuario);

--
DROP SEQUENCE IF EXISTS usuario_conectado_id_seq CASCADE;
--
CREATE SEQUENCE usuario_conectado_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 7 CACHE 1 ;

--


DROP TABLE IF EXISTS usuario_conectado CASCADE;
CREATE TABLE usuario_conectado (
id int4 NOT NULL DEFAULT nextval('usuario_conectado_id_seq'::regclass),
id_usuario int4 NOT NULL
);
ALTER TABLE ONLY  usuario_conectado  ADD CONSTRAINT  usuario_conectado_pkey  PRIMARY KEY  (id_usuario);

--
DROP SEQUENCE IF EXISTS usuario_funcion_sistema_id_usuario_funcion_sistema_seq CASCADE;
--
CREATE SEQUENCE usuario_funcion_sistema_id_usuario_funcion_sistema_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 7 CACHE 1 ;

--


DROP TABLE IF EXISTS usuario_funcion_sistema CASCADE;
CREATE TABLE usuario_funcion_sistema (
id_usuario_funcion_sistema int4 NOT NULL DEFAULT nextval('usuario_funcion_sistema_id_usuario_funcion_sistema_seq'::regclass),
id_usuario varchar(25),
id_funciones_sistema varchar(25),
valor varchar(25)
);
ALTER TABLE ONLY  usuario_funcion_sistema  ADD CONSTRAINT  usuario_funcion_sistema_pkey  PRIMARY KEY  (id_usuario_funcion_sistema);


--trigger

--Funciones
DROP FUNCTION IF EXISTS llenarbitacora();

--Funcion: llenarbitacora()
CREATE OR REPLACE FUNCTION llenarbitacora()
                                RETURNS trigger AS
                              $BODY$

        DECLARE
        id_u integer;

        BEGIN

        IF (TG_OP = 'DELETE') THEN
        SELECT usuario INTO id_u from usuario_on;
         INSERT INTO bitacora(nombre_tabla,tipo_operacion,fecha,hora,id_usuario, viejo_valor, nuevo_valor) 
        SELECT TG_TABLE_NAME,'Eliminaci贸n',cast(now() as date),cast(now() as time),id_u,OLD, 'VACIO';
            RETURN OLD;
        ELSIF (TG_OP = 'UPDATE') THEN
             SELECT usuario INTO id_u from usuario_on;
         INSERT INTO bitacora(nombre_tabla,tipo_operacion,fecha,hora,id_usuario, viejo_valor, nuevo_valor) 
        SELECT TG_TABLE_NAME,'Modificaci贸n', cast(now() as date),cast(now() as time),id_u, OLD, NEW;
            RETURN NEW;
        ELSIF (TG_OP = 'INSERT') THEN
            SELECT usuario INTO id_u from usuario_on;
    INSERT INTO bitacora(nombre_tabla,tipo_operacion,fecha,hora,id_usuario, viejo_valor, nuevo_valor) 
        SELECT TG_TABLE_NAME,'Inclusi贸n',cast(now() as date),cast(now() as time),id_u,'VACIO', NEW;
            RETURN NEW;
        END IF;
        RETURN NULL;
    END;
                            $BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION llenarbitacora()
  OWNER TO postgres;--Funcion: logeo_usuario()

DROP FUNCTION IF EXISTS logeo_usuario();

CREATE OR REPLACE FUNCTION logeo_usuario()
                                RETURNS trigger AS
                              $BODY$
        BEGIN

        IF (TG_OP = 'DELETE') THEN
           
            INSERT INTO bitacora(nombre_tabla,tipo_operacion,fecha,hora,id_usuario, viejo_valor, nuevo_valor) 
        SELECT TG_TABLE_NAME,'Cerro Sesi贸n',cast(now() as date),cast(now() as time),OLD.id_usuario,'VACIO', 'VACIO';
            RETURN OLD;
        ELSIF (TG_OP = 'INSERT') THEN
           INSERT INTO bitacora(nombre_tabla,tipo_operacion,fecha,hora,id_usuario, viejo_valor, nuevo_valor) 
        SELECT TG_TABLE_NAME,'Inicio Sesi贸n',cast(now() as date),cast(now() as time),NEW.id_usuario,'VACIO', 'VACIO';
            RETURN NEW;
        END IF;
        RETURN NULL;
    END;
                              $BODY$
        LANGUAGE plpgsql VOLATILE
        COST 100;
        ALTER FUNCTION logeo_usuario()
        OWNER TO postgres;

--trigger de las tablas
CREATE TRIGGER activarfuncion
                                AFTER INSERT OR UPDATE OR DELETE
                                ON cargo
                                FOR EACH ROW
                                EXECUTE PROCEDURE llenarbitacora();

CREATE TRIGGER activarfuncion
                                AFTER INSERT OR UPDATE OR DELETE
                                ON concepto_de_movimiento
                                FOR EACH ROW
                                EXECUTE PROCEDURE llenarbitacora();

CREATE TRIGGER activarfuncion
                                AFTER INSERT OR UPDATE OR DELETE
                                ON entidad_propietaria
                                FOR EACH ROW
                                EXECUTE PROCEDURE llenarbitacora();

CREATE TRIGGER activarfuncion
                                AFTER INSERT OR UPDATE OR DELETE
                                ON grupo
                                FOR EACH ROW
                                EXECUTE PROCEDURE llenarbitacora();

CREATE TRIGGER activarfuncion
                                AFTER INSERT OR UPDATE OR DELETE
                                ON proveedor
                                FOR EACH ROW
                                EXECUTE PROCEDURE llenarbitacora();

CREATE TRIGGER activarfuncion
                                AFTER INSERT OR UPDATE OR DELETE
                                ON seccion
                                FOR EACH ROW
                                EXECUTE PROCEDURE llenarbitacora();

CREATE TRIGGER activarfuncion
                                AFTER INSERT OR UPDATE OR DELETE
                                ON sub_categoria_especifica
                                FOR EACH ROW
                                EXECUTE PROCEDURE llenarbitacora();

CREATE TRIGGER activarfuncion
                                AFTER INSERT OR UPDATE OR DELETE
                                ON subgrupo
                                FOR EACH ROW
                                EXECUTE PROCEDURE llenarbitacora();

-- Fin

