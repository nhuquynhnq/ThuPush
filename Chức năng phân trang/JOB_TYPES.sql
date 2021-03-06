--------------------------------------------------------
--  File created - Wednesday-May-15-2019   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Table JOB_TYPES
--------------------------------------------------------

  CREATE TABLE "JOB_TYPES" 
   (	"ID" NUMBER(19,0), 
	"JOB_TYPE_ID" NUMBER(19,0) DEFAULT 0, 
	"JOB_TYPE" VARCHAR2(200 BYTE), 
	"IS_DEFAULT" NUMBER(19,0) DEFAULT 0, 
	"IS_ACTIVE" NUMBER(19,0), 
	"SORT_ORDER" NUMBER(19,0) DEFAULT 99999, 
	"LANG" VARCHAR2(10 BYTE) DEFAULT 'en', 
	"CREATED_AT" TIMESTAMP (6), 
	"UPDATED_AT" TIMESTAMP (6)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSAUX" ;
REM INSERTING into JOB_TYPES
SET DEFINE OFF;
Insert into JOB_TYPES (ID,JOB_TYPE_ID,JOB_TYPE,IS_DEFAULT,IS_ACTIVE,SORT_ORDER,LANG,CREATED_AT,UPDATED_AT) values (1,1,'Contract',1,1,1,'en',to_timestamp('06-APR-18 04.24.38.000000000 PM','DD-MON-RR HH.MI.SSXFF AM'),to_timestamp('09-APR-18 06.18.35.000000000 AM','DD-MON-RR HH.MI.SSXFF AM'));
Insert into JOB_TYPES (ID,JOB_TYPE_ID,JOB_TYPE,IS_DEFAULT,IS_ACTIVE,SORT_ORDER,LANG,CREATED_AT,UPDATED_AT) values (2,2,'Freelance',1,1,2,'en',to_timestamp('06-APR-18 04.25.25.000000000 PM','DD-MON-RR HH.MI.SSXFF AM'),to_timestamp('09-APR-18 06.18.35.000000000 AM','DD-MON-RR HH.MI.SSXFF AM'));
Insert into JOB_TYPES (ID,JOB_TYPE_ID,JOB_TYPE,IS_DEFAULT,IS_ACTIVE,SORT_ORDER,LANG,CREATED_AT,UPDATED_AT) values (3,3,'Full Time/Permanent',1,1,3,'en',to_timestamp('06-APR-18 04.26.14.000000000 PM','DD-MON-RR HH.MI.SSXFF AM'),to_timestamp('09-APR-18 06.18.35.000000000 AM','DD-MON-RR HH.MI.SSXFF AM'));
Insert into JOB_TYPES (ID,JOB_TYPE_ID,JOB_TYPE,IS_DEFAULT,IS_ACTIVE,SORT_ORDER,LANG,CREATED_AT,UPDATED_AT) values (4,4,'Internship',1,1,4,'en',to_timestamp('06-APR-18 04.26.58.000000000 PM','DD-MON-RR HH.MI.SSXFF AM'),to_timestamp('09-APR-18 06.18.27.000000000 AM','DD-MON-RR HH.MI.SSXFF AM'));
Insert into JOB_TYPES (ID,JOB_TYPE_ID,JOB_TYPE,IS_DEFAULT,IS_ACTIVE,SORT_ORDER,LANG,CREATED_AT,UPDATED_AT) values (5,5,'Part Time',1,1,5,'en',to_timestamp('06-APR-18 04.29.17.000000000 PM','DD-MON-RR HH.MI.SSXFF AM'),to_timestamp('09-APR-18 06.18.35.000000000 AM','DD-MON-RR HH.MI.SSXFF AM'));
Insert into JOB_TYPES (ID,JOB_TYPE_ID,JOB_TYPE,IS_DEFAULT,IS_ACTIVE,SORT_ORDER,LANG,CREATED_AT,UPDATED_AT) values (11,1,'Contrato',0,1,1,'es',to_timestamp('12-APR-18 11.49.44.000000000 AM','DD-MON-RR HH.MI.SSXFF AM'),null);
Insert into JOB_TYPES (ID,JOB_TYPE_ID,JOB_TYPE,IS_DEFAULT,IS_ACTIVE,SORT_ORDER,LANG,CREATED_AT,UPDATED_AT) values (12,4,'Internado',0,1,2,'es',to_timestamp('12-APR-18 11.49.44.000000000 AM','DD-MON-RR HH.MI.SSXFF AM'),null);
Insert into JOB_TYPES (ID,JOB_TYPE_ID,JOB_TYPE,IS_DEFAULT,IS_ACTIVE,SORT_ORDER,LANG,CREATED_AT,UPDATED_AT) values (13,2,'Lanza libre',0,1,3,'es',to_timestamp('12-APR-18 11.49.44.000000000 AM','DD-MON-RR HH.MI.SSXFF AM'),null);
Insert into JOB_TYPES (ID,JOB_TYPE_ID,JOB_TYPE,IS_DEFAULT,IS_ACTIVE,SORT_ORDER,LANG,CREATED_AT,UPDATED_AT) values (14,5,'Medio tiempo',0,1,4,'es',to_timestamp('12-APR-18 11.49.44.000000000 AM','DD-MON-RR HH.MI.SSXFF AM'),null);
Insert into JOB_TYPES (ID,JOB_TYPE_ID,JOB_TYPE,IS_DEFAULT,IS_ACTIVE,SORT_ORDER,LANG,CREATED_AT,UPDATED_AT) values (15,3,'Tiempo completo / permanente',0,1,5,'es',to_timestamp('12-APR-18 11.49.44.000000000 AM','DD-MON-RR HH.MI.SSXFF AM'),null);
Insert into JOB_TYPES (ID,JOB_TYPE_ID,JOB_TYPE,IS_DEFAULT,IS_ACTIVE,SORT_ORDER,LANG,CREATED_AT,UPDATED_AT) values (16,2,'?????? ?????',0,1,1,'ar',to_timestamp('12-APR-18 11.51.20.000000000 AM','DD-MON-RR HH.MI.SSXFF AM'),null);
Insert into JOB_TYPES (ID,JOB_TYPE_ID,JOB_TYPE,IS_DEFAULT,IS_ACTIVE,SORT_ORDER,LANG,CREATED_AT,UPDATED_AT) values (17,5,'???? ????',0,1,2,'ar',to_timestamp('12-APR-18 11.51.20.000000000 AM','DD-MON-RR HH.MI.SSXFF AM'),null);
Insert into JOB_TYPES (ID,JOB_TYPE_ID,JOB_TYPE,IS_DEFAULT,IS_ACTIVE,SORT_ORDER,LANG,CREATED_AT,UPDATED_AT) values (18,3,'???? ????',0,1,3,'ar',to_timestamp('12-APR-18 11.51.20.000000000 AM','DD-MON-RR HH.MI.SSXFF AM'),null);
Insert into JOB_TYPES (ID,JOB_TYPE_ID,JOB_TYPE,IS_DEFAULT,IS_ACTIVE,SORT_ORDER,LANG,CREATED_AT,UPDATED_AT) values (19,1,'???',0,1,4,'ar',to_timestamp('12-APR-18 11.51.20.000000000 AM','DD-MON-RR HH.MI.SSXFF AM'),null);
Insert into JOB_TYPES (ID,JOB_TYPE_ID,JOB_TYPE,IS_DEFAULT,IS_ACTIVE,SORT_ORDER,LANG,CREATED_AT,UPDATED_AT) values (20,4,'???? ?????',0,1,5,'ar',to_timestamp('12-APR-18 11.51.20.000000000 AM','DD-MON-RR HH.MI.SSXFF AM'),null);
Insert into JOB_TYPES (ID,JOB_TYPE_ID,JOB_TYPE,IS_DEFAULT,IS_ACTIVE,SORT_ORDER,LANG,CREATED_AT,UPDATED_AT) values (21,4,'???????',0,1,1,'ur',to_timestamp('12-APR-18 11.52.38.000000000 AM','DD-MON-RR HH.MI.SSXFF AM'),null);
Insert into JOB_TYPES (ID,JOB_TYPE_ID,JOB_TYPE,IS_DEFAULT,IS_ACTIVE,SORT_ORDER,LANG,CREATED_AT,UPDATED_AT) values (22,5,'??? ???',0,1,2,'ur',to_timestamp('12-APR-18 11.52.38.000000000 AM','DD-MON-RR HH.MI.SSXFF AM'),null);
Insert into JOB_TYPES (ID,JOB_TYPE_ID,JOB_TYPE,IS_DEFAULT,IS_ACTIVE,SORT_ORDER,LANG,CREATED_AT,UPDATED_AT) values (23,2,'??? ????',0,1,3,'ur',to_timestamp('12-APR-18 11.52.38.000000000 AM','DD-MON-RR HH.MI.SSXFF AM'),null);
Insert into JOB_TYPES (ID,JOB_TYPE_ID,JOB_TYPE,IS_DEFAULT,IS_ACTIVE,SORT_ORDER,LANG,CREATED_AT,UPDATED_AT) values (24,1,'??????',0,1,4,'ur',to_timestamp('12-APR-18 11.52.38.000000000 AM','DD-MON-RR HH.MI.SSXFF AM'),null);
Insert into JOB_TYPES (ID,JOB_TYPE_ID,JOB_TYPE,IS_DEFAULT,IS_ACTIVE,SORT_ORDER,LANG,CREATED_AT,UPDATED_AT) values (25,3,'???? ??? / ?????',0,1,5,'ur',to_timestamp('12-APR-18 11.52.38.000000000 AM','DD-MON-RR HH.MI.SSXFF AM'),null);
--------------------------------------------------------
--  DDL for Index SYS_C007474
--------------------------------------------------------

  CREATE UNIQUE INDEX "SYS_C007474" ON "JOB_TYPES" ("ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSAUX" ;
--------------------------------------------------------
--  Constraints for Table JOB_TYPES
--------------------------------------------------------

  ALTER TABLE "JOB_TYPES" MODIFY ("ID" NOT NULL ENABLE);
  ALTER TABLE "JOB_TYPES" MODIFY ("CREATED_AT" NOT NULL ENABLE);
  ALTER TABLE "JOB_TYPES" ADD PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSAUX"  ENABLE;
