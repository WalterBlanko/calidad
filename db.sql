-- Tabla Administrador
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `idadm` int(11) NOT NULL,
  `aemail` varchar(100) NOT NULL,
  `apassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin`(`idadm`, `aemail`, `apassword`) VALUES ('1','javier.roldan_27@hotmail.com','javierr27');

-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadm`);

-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `idadm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

  -- Tabla roles
  -- Estructura de tabla para la tabla `roles`
--
CREATE TABLE `roles` (
  `idrol` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rol` enum('a','d','s','p') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idrol`, `email`, `rol`) VALUES ('0', 'juanperez@gmail.com', 'p');
INSERT INTO `roles` (`idrol`, `email`, `rol`) VALUES ('1','javier.roldan_27@hotmail.com','a');
INSERT INTO `roles` (`idrol`, `email`, `rol`) VALUES ('2', 'secretaria.anar@cmgalenos.cl', 's');

-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idrol`);

-- AUTO_INCREMENT de la tabla `roles`
--

ALTER TABLE `roles`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


-- Tabla Paciente
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `pid` int(11) NOT NULL,
  `pemail` varchar(100) NOT NULL,
  `pnombre` varchar(100) NOT NULL,
  `ppassword` varchar(50) NOT NULL,
  `pdireccion` varchar(100) NOT NULL,
  `prut` varchar(100) NOT NULL,
  `pfnac` date NOT NULL,
  `pcelular` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `patient`
--

INSERT INTO `paciente` (`pid`, `pemail`, `pnombre`, `ppassword`, `pdireccion`, `prut`, `pfnac`, `pcelular`) 
VALUES ('1', 'javier.roldan027@gmail.com\'', 'Javier Roldan', 'javierr27', 'Nariño 6322', '20003218-7', '1998-11-27', '+56 983572953');

--
-- Indices de la tabla `patient`
--

ALTER TABLE `paciente`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT de la tabla `patient`
--

ALTER TABLE `paciente`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

/*Indices de la tabla Especialidad*/
CREATE TABLE `cmgalenos`.`especialidad` (
  `sid` INT(2) NOT NULL , 
  `name` VARCHAR(50) NOT NULL 
  ) ENGINE = InnoDB CHARSET=utf16 COLLATE utf16_spanish_ci;

ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`sid`);
  

  
INSERT INTO `especialidad`(`sid`, `name`) VALUES ('1','Medicina General');
INSERT INTO `especialidad`(`sid`, `name`) VALUES ('2','Alergologia');
INSERT INTO `especialidad`(`sid`, `name`) VALUES ('3','Anestesiologia');
INSERT INTO `especialidad`(`sid`, `name`) VALUES ('4','Angiologia');
INSERT INTO `especialidad`(`sid`, `name`) VALUES ('5','Cardiologia');
INSERT INTO `especialidad`(`sid`, `name`) VALUES ('6','Endocrinologia');
INSERT INTO `especialidad`(`sid`, `name`) VALUES ('7','Estomatologia');
INSERT INTO `especialidad`(`sid`, `name`) VALUES ('8','Gastroenterologia');
INSERT INTO `especialidad`(`sid`, `name`) VALUES ('9','Genitica');
INSERT INTO `especialidad`(`sid`, `name`) VALUES ('10','Geriatria');
INSERT INTO `especialidad`(`sid`, `name`) VALUES ('11','Hematologia');
INSERT INTO `especialidad`(`sid`, `name`) VALUES ('12','Infectologia');
INSERT INTO `especialidad`(`sid`, `name`) VALUES ('13','Nefrologia');
INSERT INTO `especialidad`(`sid`, `name`) VALUES ('14','Neumologia');
INSERT INTO `especialidad`(`sid`, `name`) VALUES ('15','Neurologia');


CREATE TABLE `cmgalenos`.`medico` 
(`docid` INT(11) NOT NULL AUTO_INCREMENT , 
`docemail` VARCHAR(255) NOT NULL , 
`docpassword` VARCHAR(255) NOT NULL , 
`docrut` INT NOT NULL , 
`docdv` VARCHAR(1) NOT NULL , 
`docappaterno` VARCHAR(255) NOT NULL , 
`docapmaterno` VARCHAR(255) NOT NULL , 
`docpnombre` VARCHAR(255) NOT NULL , 
`docsnombre` VARCHAR(255) NOT NULL ,
`especialidad` int(2) NOT NULL,
PRIMARY KEY (`docid`)) ENGINE = InnoDB;

INSERT INTO `medico` (`docid`, `docemail`, `docpassword`, `docrut`, `docdv`, `docappaterno`, `docapmaterno`, `docpnombre`, `docsnombre`, `especialidad`) 
VALUES ('1', 'medico.martag@cmgalenos.cl', 'martag', '11649964', '0', 'Galvez', 'Castro', 'Marta', 'Clovis', '1')


CREATE TABLE `secretaria` 
(`sid` INT(11) NOT NULL AUTO_INCREMENT , 
`semail` VARCHAR(255) NOT NULL , 
`spassword` VARCHAR(255) NOT NULL , 
`srut` INT NOT NULL , 
`sdv` VARCHAR(1) NOT NULL , 
`sappaterno` VARCHAR(255) NOT NULL , 
`sapmaterno` VARCHAR(255) NOT NULL , 
`spnombre` VARCHAR(255) NOT NULL , 
`ssnombre` VARCHAR(255) NOT NULL ,
PRIMARY KEY (`sid`)) ENGINE = InnoDB;

INSERT INTO `secretaria` (`sid`, `semail`, `spassword`, `srut`, `sdv`, `sappaterno`, `sapmaterno`, `spnombre`, `ssnombre`) 
VALUES ('1', 'secretaria.anar@cmgalenos.cl', 'anar', '35550268', '6', 'Rodriguez', 'Perez', 'Ana', 'Maria')

INSERT INTO `secretaria` (`sid`, `semail`, `spassword`, `srut`, `sdv`, `sappaterno`, `sapmaterno`, `spnombre`, `ssnombre`) 
VALUES ('2', 'secretaria.mariad@cmgalenos.cl', 'mariad', '35550268', '6', 'Diaz', 'Munoz', 'Maria', 'Angeles')