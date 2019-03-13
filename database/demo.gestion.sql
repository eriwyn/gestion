CREATE TABLE IF NOT EXISTS users (
  id int NOT NULL UNIQUE auto_increment,
  login varchar(64) NOT NULL UNIQUE,
  password varchar(64) NOT NULL,
  lastName varchar(64),
  firstName varchar(64),
  userType int NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS clients (
  id int NOT NULL UNIQUE auto_increment,
  name varchar(64) NOT NULL UNIQUE,
  address text,
  city varchar(64),
  postalCode varchar(16),
  country varchar(64),
  tel varchar(32),
  mail varchar(54),
  remainingHours int,
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS contacts (
  id int NOT NULL UNIQUE auto_increment,
  lastName varchar(64) NOT NULL,
  firstName varchar(64) NOT NULL,
  address text,
  city varchar(64),
  postalCode varchar(16),
  country varchar(64),
  tel varchar(32),
  mail varchar(54),
  function varchar(64),
  interlocutor boolean NOT NULL,
  clientId int NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (clientId) REFERENCES clients (id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS purchases (
  id int NOT NULL UNIQUE auto_increment,
  name varchar(64) NOT NULL,
  description text,
  detail text,
  clientId int NOT NULL,
  purchasedHours int,
  remainingHours int,
  purchaseDate date,
  PRIMARY KEY (id),
  FOREIGN KEY (clientId) REFERENCES clients (id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS tasks (
  id int NOT NULL UNIQUE auto_increment,
  name varchar(64) NOT NULL,
  detail text,
  creationDate date,
  status varchar(16),
  beginningDate datetime,
  duration int,
  purchaseId int NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (purchaseId) REFERENCES purchases (id) ON DELETE CASCADE
);
