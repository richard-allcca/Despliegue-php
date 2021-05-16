CREATE TABLE registros (
  id INT (11) NOT NULL,
  nombre TEXT NOT NULL,
  email TEXT NOT NULL,
  password VARCHAR(11) NOT NULL,
  fecha TIMESTAMP default CURRENT_TIMESTAMP()
);

SELECT * FROM registros;

INSERT INTO registros (id, nombre, email, password, fecha) 
VALUES (01,"richard","richard@gmail.com","123456",NULL);
