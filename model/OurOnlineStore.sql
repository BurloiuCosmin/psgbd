DROP TABLE jocuri CASCADE CONSTRAINTS
/
DROP TABLE clienti CASCADE CONSTRAINTS
/
DROP TABLE angajati CASCADE CONSTRAINTS
/
DROP TABLE comenzi CASCADE CONSTRAINTS
/
DROP TABLE comenzi_detalii CASCADE CONSTRAINTS
/
DROP TABLE mesaje CASCADE CONSTRAINTS
/
DROP TABLE rating CASCADE CONSTRAINTS
/
DROP TABLE recenzii CASCADE CONSTRAINTS
/
DROP TABLE statistici CASCADE CONSTRAINTS
/

CREATE TABLE jocuri (
	id INT NOT NULL PRIMARY KEY,
	nume VARCHAR(100) NOT NULL,
  pret INT NOT NULL,
  disponibilitate NUMBER(1,0) DEFAULT 1,
  stoc INT NOT NULL,
	versiune INT,
	an_lansare INT NOT NULL,
  tematica VARCHAR(50) NOT NULL,
	producator VARCHAR(50) NOT NULL,
  nota INT
);

CREATE TABLE clienti (
  id INT NOT NULL PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  parola VARCHAR(30) NOT NULL,
  nume VARCHAR(30) NOT NULL,
  prenume VARCHAR(30) NOT NULL,
  telefon VARCHAR(30),
  email VARCHAR(30),
  fidelitate INT NOT NULL,
  adresa_livrare VARCHAR(100) NOT NULL
);

CREATE TABLE angajati (
  id INT NOT NULL PRIMARY KEY,
  nume VARCHAR(30) NOT NULL,
  prenume VARCHAR(30) NOT NULL,
  username VARCHAR(30) NOT NULL,
  parola VARCHAR(30) NOT NULL,
  email VARCHAR(30) NOT NULL,
  rol VARCHAR(30) NOT NULL
);

CREATE TABLE comenzi (
  id INT NOT NULL PRIMARY KEY,  
  id_client INT NOT NULL,
  id_angajat INT NOT NULL,
  data_plasare DATE NOT NULL,
  data_livrare DATE NOT NULL,
  status_comanda VARCHAR(30) NOT NULL,
  precomanda INTEGER NOT NULL,
  CONSTRAINT fk_comanda_id_client FOREIGN KEY (id_client) REFERENCES clienti(id),
  CONSTRAINT fk_comanda_id_angajat FOREIGN KEY (id_angajat) REFERENCES angajati(id)
);

CREATE TABLE comenzi_detalii (
  id INT NOT NULL PRIMARY KEY,
  id_comanda INT NOT NULL,
  id_joc INT NOT NULL,  
  CONSTRAINT fk_detalii_id_comanda FOREIGN KEY (id_comanda) REFERENCES comenzi(id),
  CONSTRAINT fk_detalii_id_joc FOREIGN KEY (id_joc) REFERENCES jocuri(id)
);

CREATE TABLE mesaje (
  id INT NOT NULL PRIMARY KEY,  
  id_client INT NOT NULL,
  id_angajat INT NOT NULL,
  id_expeditor INT NOT NULL,
  data_trimitere DATE NOT NULL,
  continut VARCHAR(200) NOT NULL,
  CONSTRAINT fk_mesaj_id_client FOREIGN KEY (id_client) REFERENCES clienti(id),
  CONSTRAINT fk_mesaj_id_angajat FOREIGN KEY (id_angajat) REFERENCES angajati(id)
);

CREATE TABLE rating (
  id INT NOT NULL PRIMARY KEY,
  id_client INT NOT NULL,
  id_joc INT NOT NULL,
  nota INT NOT NULL,
  CONSTRAINT fk_rating_id_client FOREIGN KEY (id_client) REFERENCES clienti(id),
  CONSTRAINT fk_rating_id_joc FOREIGN KEY (id_joc) REFERENCES jocuri(id)
);

CREATE TABLE recenzii (
  id INT NOT NULL PRIMARY KEY,
  id_client INT NOT NULL,
  id_joc INT NOT NULL,
  continut VARCHAR(200) NOT NULL,
  data_recenzie DATE NOT NULL,
  CONSTRAINT fk_recenzie_id_client FOREIGN KEY (id_client) REFERENCES clienti(id),
  CONSTRAINT fk_recenzie_id_joc FOREIGN KEY (id_joc) REFERENCES jocuri(id)
);

CREATE TABLE statistici (
  id_client INT NOT NULL PRIMARY KEY,
  nr_j_cump_recent INT NOT NULL,
  fidelitate INT NOT NULL,
  CONSTRAINT fk_statistica_id_client FOREIGN KEY (id_client) REFERENCES clienti(id)
);

-- populare tabele
  -- tabela jocuri
SET SERVEROUTPUT ON;
DECLARE
TYPE varr IS VARRAY(1000) OF varchar(100);
  lista_nume_jocuri varr := varr('Knights Empire', 'Fire Dragons', 'Iced Fire', 'Detroit: Become Human', 'Assassin s Creed', 'Call of Duty', 'FIFA', 'Spiderman', 'God of War', 'Bioshock', 'Red Dead Redemption', 'Sims', 'Age of Empire', 'Grand Theft Auto', 'League of Legends', 'Counter Strike', 'DotA');
  v_nume VARCHAR(100);
  v_pret NUMBER(3);
  v_stoc NUMBER(6);
  v_versiune NUMBER(2);
  v_an_lansare NUMBER(4);
  lista_tematica_jocuri varr := varr('actiune', 'aventura', 'lupte', 'puzzle', 'curse', 'RPG', 'sport', 'strategie', 'shooter FPS', 'shooter TPS');
  lista_producator_jocuri varr := varr('07th Expansion', '11 bit studios', '1C Company', '2K Games', 'Quantic Dreams', '3D Realms', '505 Games', '7th Level', 'Accolade');
  v_tematica_jocuri VARCHAR(50);
  v_producator VARCHAR(50);
  v_disponibilitate NUMBER(1,0) DEFAULT 1;
  v_nota NUMBER(1);
BEGIN
  FOR v_iterator IN 1..1000000 LOOP
    v_nume := lista_nume_jocuri(TRUNC(DBMS_RANDOM.VALUE(0, lista_nume_jocuri.count))+1);
    v_pret := TRUNC(DBMS_RANDOM.VALUE(50, 500))+1;
    v_stoc := TRUNC(DBMS_RANDOM.VALUE(0, 500000))+1;
    v_versiune := TRUNC(DBMS_RANDOM.VALUE(1, 18))+1;
    v_an_lansare := TRUNC(DBMS_RANDOM.VALUE(2000, 2018))+1;
    v_tematica_jocuri := lista_tematica_jocuri(TRUNC(DBMS_RANDOM.VALUE(0, lista_tematica_jocuri.count))+1);
    v_producator := lista_producator_jocuri(TRUNC(DBMS_RANDOM.VALUE(0, lista_producator_jocuri.count))+1);
    v_nota := TRUNC(DBMS_RANDOM.VALUE(1, 5))+1;
    
    INSERT INTO jocuri VALUES(v_iterator, v_nume, v_pret, v_disponibilitate, v_stoc, v_versiune, v_an_lansare, v_tematica_jocuri, v_producator, v_nota);
  END LOOP;
END;
/

  -- tabela clienti
DECLARE
TYPE varr IS VARRAY(1000) OF varchar(100);
lista_username varr := varr('userino79', 'danabido2', 'alandala', 'portocala', 'lalala', 'userxpert', 'contdeuser', 'altcontdeuser', 'userrrr', 'usernameee');
lista_parola varr := varr('userino79', 'danabido2', 'alandala', 'portocala', 'lalala', 'userxpert', 'contdeuser', 'altcontdeuser', 'userrrr', 'usernameee');
lista_nume varr := varr('Albu', 'Albulescu', 'Afanasov', 'Avarvarei', 'Apostol', 'Andronic', 'Arusoaie', 'Asandei', 'Boca', 'Cusmuliuc', 'Hlusneac', 'Burloiu', 'Burluc', 'Munteanu', 'Macovei', 'Gradinariu', 'Horobet', 'Bulboaca', 'Cretu', 'Samson', 'Constantinescu', 'Stanciuc', 'Amarandei', 'Petrescu', 'Georgescu');
lista_prenume varr := varr('Ana', 'Denisa', 'Larisa', 'Lucia', 'Andreea', 'Maria', 'Stefania', 'Alina', 'Bianca', 'Stefan', 'Ciprian', 'Mihai', 'Vlad', 'Cosmin', 'Laur', 'Andrei', 'Eduard', 'Vasile', 'Grigore', 'Ioan', 'Ion', 'Pavel', 'Robert', 'Madalin');
lista_telefon varr := varr('0711111111', '0722222222', '0733333333', '0744444444', '0755555555', '0766666666', '0777777777', '0788888888', '0799999999', '0712345678', '0798456102');
lista_email varr := varr('lala@yahoo.com', 'lala2@yahoo.com', 'xulescu@gmail.com', 'pixulescu@gmail.com', 'andreescu@yahoo.ro', 'marinescu@gmail.com', 'andronescu@yahoo.com', 'androhovici@gmail.com', 'ixipixi@yahoo.ro');
v_fidelitate NUMBER(1);
lista_adresa_livrare varr := varr('Teiului 12', 'Marului 34', 'Cimpoi 19', 'Lalelelor 45', 'O strada 67', 'Jupiter 59', 'Alee 23', 'Florilor 90', 'Balcescu 6');
v_username VARCHAR(100);
v_parola VARCHAR(100);
v_nume VARCHAR(100);
v_prenume VARCHAR(100);
v_telefon VARCHAR(100);
v_email VARCHAR(100);
v_adresa_livrare VARCHAR(100);

BEGIN
  FOR v_iterator IN 1..100000 LOOP
    v_username := lista_username(TRUNC(DBMS_RANDOM.VALUE(0,lista_username.count))+1);
    v_parola := lista_parola(TRUNC(DBMS_RANDOM.VALUE(0,lista_parola.count))+1);
    v_nume := lista_nume(TRUNC(DBMS_RANDOM.VALUE(0,lista_nume.count))+1);
    v_prenume := lista_prenume(TRUNC(DBMS_RANDOM.VALUE(0,lista_prenume.count))+1);
    v_telefon := lista_telefon(TRUNC(DBMS_RANDOM.VALUE(0,lista_telefon.count))+1);
    v_email := lista_email(TRUNC(DBMS_RANDOM.VALUE(0,lista_email.count))+1);
    v_fidelitate := TRUNC(DBMS_RANDOM.VALUE(0,2))+1;
    v_adresa_livrare := lista_adresa_livrare(TRUNC(DBMS_RANDOM.VALUE(0,lista_adresa_livrare.count))+1);
    --DBMS_OUTPUT.PUT_LINE(v_iterator||' '||v_username||' '||v_parola||' '||v_nume||' '||v_prenume||' '||v_telefon||' '||v_email||' '||v_fidelitate||' '||v_adresa_livrare);
    INSERT INTO clienti VALUES(v_iterator, v_username, v_parola, v_nume, v_prenume, v_telefon, v_email, v_fidelitate, v_adresa_livrare);
  END LOOP;
END;
/

 -- tabela angajati
DECLARE
TYPE varr IS VARRAY(1000) OF varchar(100);
lista_username varr := varr('admin_cont1', 'admin_cont2', 'admin_cont3', 'admin_cont4', 'admin_cont5', 'admin_cont6', 'admin_cont7', 'admin_cont8', 'admin_cont9', 'admin_cont10', 'admin_cont11', 'admin_cont12', 'admin_cont13', 'admin_cont14', 'admin_cont15');
lista_parola varr := varr('userino79', 'danabido2', 'alandala', 'portocala', 'lalala', 'userxpert', 'contdeuser', 'altcontdeuser', 'userrrr', 'usernameee');
lista_nume varr := varr('Albu', 'Albulescu', 'Afanasov', 'Avarvarei', 'Apostol', 'Andronic', 'Arusoaie', 'Asandei', 'Boca', 'Cusmuliuc', 'Hlusneac', 'Burloiu', 'Burluc', 'Munteanu', 'Macovei', 'Gradinariu', 'Horobet', 'Bulboaca', 'Cretu', 'Samson', 'Constantinescu', 'Stanciuc', 'Amarandei', 'Petrescu', 'Georgescu');
lista_prenume varr := varr('Ana', 'Denisa', 'Larisa', 'Lucia', 'Andreea', 'Maria', 'Stefania', 'Alina', 'Bianca', 'Stefan', 'Ciprian', 'Mihai', 'Vlad', 'Cosmin', 'Laur', 'Andrei', 'Eduard', 'Vasile', 'Grigore', 'Ioan', 'Ion', 'Pavel', 'Robert', 'Madalin');
lista_email varr := varr('lala@yahoo.com', 'lala2@yahoo.com', 'xulescu@gmail.com', 'pixulescu@gmail.com', 'andreescu@yahoo.ro', 'marinescu@gmail.com', 'andronescu@yahoo.com', 'androhovici@gmail.com', 'ixipixi@yahoo.ro');
v_username VARCHAR(100);
v_parola VARCHAR(100);
v_nume VARCHAR(100);
v_prenume VARCHAR(100);
v_email VARCHAR(100);
v_rol VARCHAR(100) := 'angajat';

BEGIN
  FOR v_iterator IN 1..100000 LOOP
    v_username := lista_username(TRUNC(DBMS_RANDOM.VALUE(0,lista_username.count))+1);
    v_parola := lista_parola(TRUNC(DBMS_RANDOM.VALUE(0,lista_parola.count))+1);
    v_nume := lista_nume(TRUNC(DBMS_RANDOM.VALUE(0,lista_nume.count))+1);
    v_prenume := lista_prenume(TRUNC(DBMS_RANDOM.VALUE(0,lista_prenume.count))+1);
    v_email := lista_email(TRUNC(DBMS_RANDOM.VALUE(0,lista_email.count))+1);
    --DBMS_OUTPUT.PUT_LINE(v_iterator||' '||v_username||' '||v_parola||' '||v_nume||' '||v_prenume||' '||v_telefon||' '||v_email||' '||v_fidelitate||' '||v_adresa_livrare);
    INSERT INTO angajati VALUES(v_iterator, v_nume, v_prenume, v_username, v_parola, v_email, v_rol);
  END LOOP;
END;
/
UPDATE angajati SET rol = 'manager' WHERE id = 1;
/


-- populare tabela comenzi
Begin
  For V_Iterator In 1..30000 Loop
    Insert Into Comenzi Values (V_Iterator, V_Iterator, V_Iterator, To_Date('2019/05/03', 'yyyy/mm/dd'), To_Date('2019/05/06', 'yyyy/mm/dd'), 'livrata', 0);
  End Loop;
  For V_Iterator In 1..80000 Loop
    If(V_Iterator<=40000) Then
      Insert Into Comenzi Values (V_Iterator+30000, V_Iterator+30000, V_Iterator+30000, To_Date('2019/05/03', 'yyyy/mm/dd'), To_Date('2019/05/06', 'yyyy/mm/dd'), 'livrata', 0);
    Else
      Insert Into Comenzi Values (V_Iterator+30000, V_Iterator-10000, V_Iterator-10000, To_Date('2019/05/07', 'yyyy/mm/dd'), To_Date('2019/05/10', 'yyyy/mm/dd'), 'livrata', 0);
    End If;
  End Loop;
  For V_Iterator In 1..90000 Loop
    If(V_Iterator >=1 And V_Iterator <=30000) Then
      Insert Into Comenzi Values (V_Iterator+110000, V_Iterator+70000, V_Iterator+70000, To_Date('2019/05/03', 'yyyy/mm/dd'), To_Date('2019/05/06', 'yyyy/mm/dd'), 'livrata', 0);
    Elsif(V_Iterator >= 30001 And V_Iterator <= 60000) Then
      Insert Into Comenzi Values (V_Iterator+110000, V_Iterator+40000, V_Iterator+40000, To_Date('2019/05/03', 'yyyy/mm/dd'), To_Date('2019/05/06', 'yyyy/mm/dd'), 'livrata', 0);
    Else
      Insert Into Comenzi Values (V_Iterator+110000, V_Iterator+10000, V_Iterator+10000, To_Date('2019/05/03', 'yyyy/mm/dd'), To_Date('2019/05/06', 'yyyy/mm/dd'), 'livrata', 0);
    End If;
  End Loop;
End;
/

-- populare tabela comenzi_detalii
BEGIN
  FOR v_iterator IN 1..200000 LOOP
    INSERT INTO comenzi_detalii VALUES (3*v_iterator-2, v_iterator, DBMS_RANDOM.VALUE(1, 1000000));
    INSERT INTO comenzi_detalii VALUES (3*v_iterator-1, v_iterator, DBMS_RANDOM.VALUE(1, 1000000));
    INSERT INTO comenzi_detalii VALUES (3*v_iterator, v_iterator, DBMS_RANDOM.VALUE(1, 1000000));
  END LOOP;
END;
/
  
  -- INDEX
  CREATE INDEX id_comanda_idx
    ON comenzi_detalii (id_comanda)
    COMPUTE STATISTICS;
/  

-- FUNCTII DE BAZA
begin
insert into clienti values(1, 'mariahlusneac', 'mariahlusneac', 'Hlusneac', 'Maria', '0755795912', 'mariahlusneac@yahoo.com', 0, 'Oituz');
end;
CREATE OR REPLACE FUNCTION register(p_username VARCHAR2, p_parola VARCHAR2, p_nume VARCHAR2, p_prenume VARCHAR2, p_telefon VARCHAR2, p_email VARCHAR2, p_adresa_livrare VARCHAR2)
RETURN INTEGER AS
  ultimul_id INTEGER;
  id_client_nou INTEGER;
  counter INTEGER;
BEGIN
  SELECT COUNT(*) into counter FROM clienti WHERE username = p_username and parola = p_parola and email = p_email;
  if(counter = 0) THEN
    SELECT id into ultimul_id from clienti where rownum = 1 order by id desc;
    id_client_nou := ultimul_id + 1;
    --INSERT INTO CLIENTI VALUES(id_client_nou, p_username, p_parola, p_nume, p_prenume, p_telefon, p_email, 0, p_adresa_livrare);
  end if;
  if(counter = 0) then
  RETURN 1;
  else
  return 0;
  end if;
END;
/
declare
  x INTEGER;
begin
  x := register('mariahlusn3eac', 'mariahlusneac', 'Hlusneac', 'Mariuta', '0755555555', 'mariahlusneac@yahoo.com', 'Oituz');
  dbms_output.put_line(x);
end;


select register('mariahlu654sneac', 'mariahlusneac', 'Hlusneac', 'Maria', '0755795912', 'mariahlusneac@yahoo.com', 'Oituz') from dual;

CREATE OR REPLACE FUNCTION login(p_username VARCHAR2, p_parola VARCHAR2)
RETURN INTEGER AS
  exista_client INTEGER;
BEGIN
  exista_client := 0;
  select count(*) into exista_client from clienti where username = p_username and parola = p_parola;
  return exista_client;
END;
/


--begin
--  register('clientnou', 'clientnou', 'clientnou', 'clientnou', '0755795912', 'clientnou@gmail.com', 'Strada Restantei'); 
--end;
--/


-- FUNCTII COMPLEXE

CREATE OR REPLACE PROCEDURE vanzariFidelitate(p_id_client IN NUMBER) AS
  nr_comenzi INTEGER;
  v_cursor INTEGER;
  v_fidelitate INTEGER;
BEGIN
  SELECT COUNT(*) INTO nr_comenzi FROM comenzi_detalii WHERE id_comanda IN 
    (SELECT id FROM comenzi where id_client=p_id_client and 
    MONTHS_BETWEEN(SYSDATE, data_plasare) <= 6);
  IF (nr_comenzi >= 9) THEN
    v_fidelitate := 2;
  ELSIF (nr_comenzi >= 6) THEN
      v_fidelitate := 1;
  ELSE
      v_fidelitate := 0;
  END IF;
  INSERT INTO statistici values (p_id_client, nr_comenzi, v_fidelitate);
END vanzariFidelitate;
/
--begin
--vanzariFidelitate(5);
--vanzariFidelitate(30001);
--vanzariFidelitate(70001);
--end;
--/

set serveroutput on;
CREATE OR REPLACE FUNCTION stocScazut(p_id_joc IN INTEGER)
RETURN INTEGER AS
  v_stoc INTEGER;
  v_scazut INTEGER;
BEGIN
  SELECT stoc INTO v_stoc FROM jocuri where id = p_id_joc;
  if(v_stoc <= 20) then
    v_scazut := 1;
  else
    v_scazut := 0;
  end if;
  return v_scazut;
END stocScazut;
/

--declare
--  v_id INTEGER := 3;
--  v_rezultat INTEGER;
--BEGIN
--  v_rezultat := stocScazut(v_id);
--  DBMS_OUTPUT.PUT_LINE(v_rezultat);
--end;
/



CREATE OR REPLACE FUNCTION jocuri2015
RETURN INTEGER AS
  CURSOR lista_id_cumparate IS SELECT id_joc FROM comenzi_detalii;
  v_id_joc comenzi_detalii.id_joc%type;
  v_an_lansare INTEGER;
  nrInainteDe2015 INTEGER;
BEGIN
  nrInainteDe2015 := 0;
  OPEN lista_id_cumparate;
  LOOP
    FETCH lista_id_cumparate INTO v_id_joc;
    EXIT WHEN lista_id_cumparate%NOTFOUND;
    SELECT an_lansare INTO v_an_lansare FROM jocuri WHERE id = v_id_joc;
    if(v_an_lansare < 2015) then
      nrInainteDe2015 := nrInainteDe2015 + 1;
    end if;
  END LOOP;
  CLOSE lista_id_cumparate;
  return nrInainteDe2015;
END jocuri2015;
/

--select count(*) from comenzi_detalii;
--set serveroutput on;
--begin
--  dbms_output.put_line('S-au vandut ' || jocuri2015 || ' jocuri lansate inainte de 2015');
--end;
--/


CREATE OR REPLACE FUNCTION reducere(p_id_joc IN INTEGER)
RETURN DECIMAL AS
  v_pret INTEGER;
  v_stoc INTEGER;
  v_an_lansare INTEGER;
  v_pret_nou DECIMAL;
BEGIN
  SELECT stoc, an_lansare, pret INTO v_stoc, v_an_lansare, v_pret FROM jocuri WHERE id = p_id_joc;
  if(v_stoc <= 20 and (EXTRACT(YEAR FROM sysdate) - v_an_lansare) >= 2) then
    v_pret_nou := v_pret * 0.7;
  end if;
  return v_pret_nou;    
END;
/

-- UPDATE jocuri SET stoc = 10, an_lansare = 2015 where id = 2;


--set serveroutput on;
--begin
--  DBMS_OUTPUT.PUT_LINE(reducere(2));
--end;
/



set serveroutput on;
CREATE OR REPLACE PROCEDURE recomandari(p_id_joc INTEGER) AS
  CURSOR lista_comenzi_cu_jocul_curent IS
    SELECT id_comanda FROM comenzi_detalii where id_joc = p_id_joc;
  v_id_comanda comenzi_detalii.id_comanda%type;
  nr_jocuri INTEGER;
  id_joc_recomandat INTEGER;
BEGIN
  OPEN lista_comenzi_cu_jocul_curent;
  LOOP
    FETCH lista_comenzi_cu_jocul_curent INTO v_id_comanda;
    EXIT WHEN lista_comenzi_cu_jocul_curent%NOTFOUND;
    SELECT COUNT(*) into nr_jocuri FROM COMENZI_DETALII WHERE id_comanda = v_id_comanda;
    if(nr_jocuri > 1) then
      SELECT id_joc into id_joc_recomandat from comenzi_detalii WHERE id_comanda = v_id_comanda and id_joc <> p_id_joc and ROWNUM = 1;
      DBMS_OUTPUT.PUT_LINE('Jocuri recomandate: ' || id_joc_recomandat);
      DBMS_OUTPUT.PUT_LINE('');
    end if;
  END LOOP;
  CLOSE lista_comenzi_cu_jocul_curent;
END;
/
--begin
--recomandari(140447);
--end;
--/


CREATE OR REPLACE PROCEDURE adaugareInCos(p_id_client INTEGER, p_id_joc INTEGER) AS
  nr_jocuri_cumparate INTEGER;
  ultimul_id_comenzi_detalii INTEGER;
  id_adaugare_comenzi_detalii INTEGER;
  ultimul_id_comenzi INTEGER;
  id_adaugare_comenzi INTEGER;
  p_id_angajat INTEGER;
BEGIN
  SELECT COUNT(*) into nr_jocuri_cumparate FROM comenzi where id_client = p_id_client AND precomanda = 1;
  SELECT id into ultimul_id_comenzi_detalii FROM comenzi_detalii WHERE ROWNUM = 1 ORDER BY id desc;
  id_adaugare_comenzi_detalii := ultimul_id_comenzi_detalii + 1;
  SELECT id into ultimul_id_comenzi FROM comenzi WHERE ROWNUM = 1 ORDER BY id desc;
  id_adaugare_comenzi := ultimul_id_comenzi + 1;
  p_id_angajat := p_id_client;
  IF(nr_jocuri_cumparate >= 1) then
    INSERT INTO comenzi_detalii values (id_adaugare_comenzi_detalii, ultimul_id_comenzi, p_id_joc);
  else
    INSERT INTO comenzi values(id_adaugare_comenzi, p_id_client, p_id_angajat, SYSDATE, SYSDATE+3, 'procesare', 1);
    INSERT INTO comenzi_detalii values(id_adaugare_comenzi_detalii, id_adaugare_comenzi, p_id_joc);
  end if;
END;
/
--declare
--  ultimul_id_comenzi INTEGER;
--  ultimul_id_comenzi_detalii INTEGER;
--BEGIN
--  SELECT id into ultimul_id_comenzi FROM comenzi WHERE ROWNUM = 1 ORDER BY id desc;
--  SELECT id into ultimul_id_comenzi_detalii FROM comenzi_detalii WHERE ROWNUM = 1 ORDER BY id desc;
--  dbms_output.put_line(ultimul_id_comenzi);
--  dbms_output.put_line(ultimul_id_comenzi_detalii);
--END;
--/




CREATE OR REPLACE PROCEDURE vizualizareCos(p_id_client INTEGER) AS
v_id_comanda INTEGER;
nume_joc VARCHAR2(30);
CURSOR lista_jocuri_comanda IS
  SELECT id_joc from comenzi_detalii where id_comanda = v_id_comanda; 
v_id_joc comenzi_detalii.id_comanda%type;
BEGIN
  select id into v_id_comanda from comenzi where precomanda = 1 and id_client = p_id_client;
  OPEN lista_jocuri_comanda;
  LOOP
    FETCH lista_jocuri_comanda INTO v_id_joc;
    EXIT WHEN lista_jocuri_comanda%NOTFOUND;
    select nume into nume_joc from jocuri where id = v_id_joc;
    dbms_output.put_line(nume_joc);
    dbms_output.put_line('');
  end loop;
  close lista_jocuri_comanda;
END;
/
UPDATE comenzi set precomanda = 1 where id = 4;
/
begin
vizualizareCos(4);
end;
/


CREATE OR REPLACE FUNCTION comenziPeZi(zi DATE)
RETURN INTEGER AS
  nr_comenzi_zi INTEGER;
BEGIN
  SELECT COUNT(*) into nr_comenzi_zi FROM comenzi where data_plasare = zi;
  RETURN nr_comenzi_zi;
END;
/

--declare
--v_vanzari INTEGER;
--begin
--v_vanzari := comenziPeZi('03-05-2019');
--dbms_output.put_line(v_vanzari);
--end;
--/



CREATE OR REPLACE PROCEDURE trimiteComanda(p_id_client INTEGER, p_id_comanda INTEGER) AS
BEGIN
  UPDATE comenzi set precomanda = 0, status_comanda='pe drum' where id_client = p_id_client and id = p_id_comanda;
END;
/
--begin
--trimiteComanda(4,4);
--end;
--/

CREATE OR REPLACE FUNCTION sumaComanda(p_id_client INTEGER)
RETURN DECIMAL AS
  v_id_comanda INTEGER;
  CURSOR lista_jocuri_comanda IS
    SELECT id_joc from comenzi_detalii where id_comanda = v_id_comanda; 
  v_id_joc comenzi_detalii.id_comanda%type;
  suma DECIMAL;
  v_pret DECIMAL;
BEGIN
  suma := 0;
  select id into v_id_comanda from comenzi where precomanda = 1 and id_client = p_id_client;
  OPEN lista_jocuri_comanda;
  LOOP
    FETCH lista_jocuri_comanda INTO v_id_joc;
    EXIT WHEN lista_jocuri_comanda%NOTFOUND;
    select pret into v_pret from jocuri where id = v_id_joc;
    suma := suma + v_pret;
  end loop;
  close lista_jocuri_comanda;
  RETURN suma;
END;
/
--declare
--  suma DECIMAL;
--begin
--  suma := 0;
--  suma := sumaComanda(4);
--  dbms_output.put_line(suma);
--end;
--/





CREATE OR REPLACE PROCEDURE filtrareDupaCategorie(p_categorie VARCHAR2) AS
  CURSOR lista_jocuri IS SELECT id, nume, pret from jocuri where tematica = p_categorie;
  v_id_joc jocuri.id%type;
  v_nume_joc jocuri.nume%type;
  v_pret_joc jocuri.pret%type;
BEGIN
  OPEN lista_jocuri;
  LOOP 
    FETCH lista_jocuri INTO v_id_joc, v_nume_joc, v_pret_joc;
    EXIT WHEN lista_jocuri%notfound;
    dbms_output.put_line(v_id_joc || ' ' || v_nume_joc || ' ' || v_pret_joc);
  END LOOP;
  CLOSE lista_jocuri;
END;
/
--begin
--  filtrareDupaCategorie('actiune');
--end;


CREATE OR REPLACE PROCEDURE verificareStoc(p_id_joc INTEGER, p_id_comanda INTEGER) AS
  nr_jocuri_disponibile INTEGER;
  nr_jocuri_comandate INTEGER;
  stoc_indisponibil exception;
  PRAGMA EXCEPTION_INIT(stoc_indisponibil, -20001);
BEGIN
  select stoc into nr_jocuri_disponibile from jocuri where id = p_id_joc;
  select count(*) into nr_jocuri_comandate from comenzi_detalii where id_joc = p_id_joc and id_comanda = p_id_comanda;
  if(nr_jocuri_disponibile - nr_jocuri_comandate < 0) then
    raise stoc_indisponibil;
  end if;
  exception
  WHEN stoc_indisponibil THEN 
    DBMS_OUTPUT.PUT_LINE('Stoc momentan indisponibil');
END;
/
--update jocuri set stoc = 0 where id = 956108;
--/
--begin
--  verificareStoc(956108, 1);
--end;



SELECT COUNT(*) FROM clienti;
/
SELECT COUNT(*) FROM jocuri;
/
SELECT COUNT(*) FROM angajati;
/


BEGIN
DBMS_OUTPUT.PUT_LINE('########################3');
END;
