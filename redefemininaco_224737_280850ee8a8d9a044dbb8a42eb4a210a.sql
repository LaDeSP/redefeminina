-- MySQL dump 10.13  Distrib 5.6.23, for linux-glibc2.5 (x86_64)
--
-- Host: mysql01-farm62.kinghost.net    Database: redefemininaco
-- ------------------------------------------------------
-- Server version	5.7.16-log
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `album_site`
--

DROP TABLE IF EXISTS `album_site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album_site` (
  `id_album` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome_album` varchar(200) NOT NULL,
  `tag_album` varchar(200) NOT NULL,
  `imagem_album` varchar(255) NOT NULL,
  PRIMARY KEY (`id_album`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album_site`
--

LOCK TABLES `album_site` WRITE;
/*!40000 ALTER TABLE `album_site` DISABLE KEYS */;
/*!40000 ALTER TABLE `album_site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caixa_entrada`
--

DROP TABLE IF EXISTS `caixa_entrada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caixa_entrada` (
  `id_caixa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `valor` float NOT NULL,
  `data_entrada` varchar(12) NOT NULL,
  `id_fluxo` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_caixa`),
  KEY `FK_caixa_entrada_fluxo_caixa` (`id_fluxo`),
  CONSTRAINT `FK_caixa_entrada_fluxo_caixa` FOREIGN KEY (`id_fluxo`) REFERENCES `fluxo_caixa` (`id_fluxo_caixa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caixa_entrada`
--

LOCK TABLES `caixa_entrada` WRITE;
/*!40000 ALTER TABLE `caixa_entrada` DISABLE KEYS */;
INSERT INTO `caixa_entrada` VALUES (1,'luz',150,'11/10/2016',1);
/*!40000 ALTER TABLE `caixa_entrada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caixa_saida`
--

DROP TABLE IF EXISTS `caixa_saida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caixa_saida` (
  `id_conta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `valor` float NOT NULL,
  `data_vencimento` varchar(12) NOT NULL,
  `id_fluxo_caixa` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_conta`),
  KEY `FK_caixa_saida_fluxo_caixa` (`id_fluxo_caixa`),
  CONSTRAINT `FK_caixa_saida_fluxo_caixa` FOREIGN KEY (`id_fluxo_caixa`) REFERENCES `fluxo_caixa` (`id_fluxo_caixa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caixa_saida`
--

LOCK TABLES `caixa_saida` WRITE;
/*!40000 ALTER TABLE `caixa_saida` DISABLE KEYS */;
INSERT INTO `caixa_saida` VALUES (1,'agua',123,'20/10/2016',1);
/*!40000 ALTER TABLE `caixa_saida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_site`
--

DROP TABLE IF EXISTS `categoria_site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria_site` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_site`
--

LOCK TABLES `categoria_site` WRITE;
/*!40000 ALTER TABLE `categoria_site` DISABLE KEYS */;
INSERT INTO `categoria_site` VALUES (1,'QUEM SOMOS','<p>A Rede Feminina de Combate ao C&acirc;ncer de Corumb&aacute; (RFCCC) &eacute; uma entidade civil de direito privado e sem fins lucrativos, que desenvolve um papel de grande relev&acirc;ncia social no munic&iacute;pio por meio de a&ccedil;&otilde;es e programas de combate ao c&acirc;ncer, al&eacute;m de apoiar as atividades governamentais que visam &agrave; promo&ccedil;&atilde;o da sa&uacute;de e cuidados preventivos contra essa doen&ccedil;a.</p>\r\n\r\n<p>A Institui&ccedil;&atilde;o, fundada em mar&ccedil;o de 2006, tem como miss&atilde;o prec&iacute;pua prestar assist&ecirc;ncia a pacientes com c&acirc;ncer, sejam homens ou mulheres, dando suporte aos doentes e a seus familiares.</p>\r\n\r\n<p>Os recursos utilizados s&atilde;o adquiridos por meio de&nbsp;parcerias,&nbsp;doa&ccedil;&otilde;es e a&ccedil;&otilde;es promocionais. A busca por parcerias &eacute; uma preocupa&ccedil;&atilde;o constante para manter a continuidade dos trabalhos com enfoque na Campanha de Preven&ccedil;&atilde;o.</p>\r\n\r\n<p><strong>Certificados</strong> : Utilidade P&uacute;blica Estadual e Utilidade P&uacute;blica Municipal</p>'),(2,'SOBRE O CÂNCER','<p>C&acirc;ncer &eacute; o nome dado a um conjunto de v&aacute;rias doen&ccedil;as que t&ecirc;m em comum o crescimento desordenado de c&eacute;lulas que invadem os tecidos e &oacute;rg&atilde;os, podendo se espalhar para outras regi&otilde;es do corpo. Estas c&eacute;lulas, dividindo-se rapidamente, tendem a ser muito agressivas e incontrol&aacute;veis determinando a forma&ccedil;&atilde;o de tumores ou&nbsp;neoplasias malignas. Por outro lado, um&nbsp;tumor benigno&nbsp;significa simplesmente uma massa localizada de c&eacute;lulas que se multiplicam vagarosamente e se assemelham ao seu tecido original, raramente constituindo um risco de vida. Outras caracter&iacute;sticas que diferenciam os diversos tipos de c&acirc;ncer entre si s&atilde;o a velocidade de multiplica&ccedil;&atilde;o das c&eacute;lulas e a capacidade de invadir tecidos e &oacute;rg&atilde;os vizinhos ou distantes. O tumor BENIGNO cresce at&eacute; um determinado tamanho e n&atilde;o se espalha para outros &oacute;rg&atilde;os. O tumor MALIGNO cresce descontroladamente e se espalha para outros &oacute;rg&atilde;os do corpo. Este processo de espalhar-se para outros &oacute;rg&atilde;os chama-se met&aacute;stase.</p>\r\n\r\n<p><strong>CAUSAS </strong></p>\r\n\r\n<p>As causas de c&acirc;ncer s&atilde;o variadas podendo ser externas ou internas ao organismo, estando ambas inter-relacionadas. As causas externas se relacionam ao meio ambiente e aos h&aacute;bitos pr&oacute;prios. As causas internas s&atilde;o, na maioria das vezes, geneticamente pr&eacute;-determinadas e est&atilde;o ligadas &agrave; capacidade do organismo de se defender das agress&otilde;es externas. Exemplos de fatores externos: exposi&ccedil;&atilde;o &agrave;s radia&ccedil;&otilde;es; exposi&ccedil;&atilde;o a produtos qu&iacute;micos; v&iacute;rus; consumo de cigarro; consumo de &aacute;lcool; dieta inadequada; falta de exerc&iacute;cios f&iacute;sicos. Exemplos de fatores internos: sistema imunol&oacute;gico comprometido; predisposi&ccedil;&atilde;o gen&eacute;tica; horm&ocirc;nios.</p>\r\n\r\n<p><strong>C&Acirc;NCER DE MAMA </strong></p>\r\n\r\n<p>O c&acirc;ncer de mama &eacute; uma doen&ccedil;a resultante da multiplica&ccedil;&atilde;o de c&eacute;lulas anormais da mama, o que forma um tumor. H&aacute; v&aacute;rios tipos de c&acirc;ncer de mama, alguns de desenvolvem rapidamente outros n&atilde;o. Esse tipo de c&acirc;ncer atinge principalmente as mulheres, embora tamb&eacute;m possa afetar os homens de um modo geral. Ao identificarem altera&ccedil;&otilde;es persistentes nas mamas, tais como n&oacute;dulos ou caro&ccedil;os, as mulheres devem procurar imediatamente um servi&ccedil;o para avalia&ccedil;&atilde;o diagn&oacute;stica, embora muitas das vezes tais altera&ccedil;&otilde;es n&atilde;o representem o surgimento da doen&ccedil;a.</p>\r\n\r\n<p><strong>SINTOMAS </strong></p>\r\n\r\n<p>O sintoma mais comum &eacute; o aparecimento de n&oacute;dulo, geralmente indolor, duro e irregular, mas h&aacute; tumores que s&atilde;o de consist&ecirc;ncia branda, globosos e bem definidos. Outros sinais s&atilde;o edema cut&acirc;neo semelhante &agrave; casca de laranja, retra&ccedil;&atilde;o cut&acirc;nea, dor, invers&atilde;o do mamilo, pequenos n&oacute;dulos na regi&atilde;o embaixo dos bra&ccedil;os (axilas) ou no pesco&ccedil;o, descama&ccedil;&atilde;o ou ulcera&ccedil;&atilde;o do mamilo e secre&ccedil;&atilde;o papilar, especialmente quando &eacute; unilateral e espont&acirc;nea. A secre&ccedil;&atilde;o associada ao c&acirc;ncer geralmente &eacute; transparente, podendo ser rosada ou avermelhada devido &agrave; presen&ccedil;a de gl&oacute;bulos vermelhos.</p>\r\n\r\n<p><strong>PREVEN&Ccedil;&Atilde;O </strong></p>\r\n\r\n<p>A preven&ccedil;&atilde;o prim&aacute;ria do c&acirc;ncer de mama est&aacute; relacionada ao controle dos fatores de risco reconhecidos. Os fatores heredit&aacute;rios e os associados ao ciclo reprodutivo da mulher n&atilde;o s&atilde;o, em princ&iacute;pio, pass&iacute;veis de mudan&ccedil;a, por&eacute;m fatores relacionados ao estilo de vida, como obesidade p&oacute;s-menopausa, sedentarismo, consumo excessivo de &aacute;lcool e terapia de reposi&ccedil;&atilde;o hormonal, s&atilde;o modific&aacute;veis. Estima-se que por meio da alimenta&ccedil;&atilde;o, nutri&ccedil;&atilde;o e atividade f&iacute;sica &eacute; poss&iacute;vel reduzir em at&eacute; 28% o risco de a mulher desenvolver c&acirc;ncer de mama.</p>\r\n\r\n<p><strong>DETEC&Ccedil;&Atilde;O PRECOCE </strong></p>\r\n\r\n<p>O c&acirc;ncer de mama pode ser detectado em fases iniciais, em grande parte dos casos, aumentando assim as chances de tratamento e cura. Todas as mulheres, independentemente da idade, podem conhecer seu corpo para saber o que &eacute; e o que n&atilde;o &eacute; normal em suas mamas. &Eacute; importante que as mulheres observem suas mamas sempre que se sentirem confort&aacute;veis para tal (seja no banho, no momento da troca de roupa ou em outra situa&ccedil;&atilde;o do cotidiano), sem t&eacute;cnica espec&iacute;fica, valorizando a descoberta casual de pequenas altera&ccedil;&otilde;es mam&aacute;rias. A maior parte dos c&acirc;nceres de mama &eacute; descoberta pelas pr&oacute;prias mulheres. Al&eacute;m de estar atenta ao pr&oacute;prio corpo, tamb&eacute;m &eacute; recomendado que mulheres de 50 a 69 anos fa&ccedil;am uma mamografia de rastreamento (quando n&atilde;o h&aacute; sinais nem sintomas) a cada dois anos. Esse exame pode ajudar a identificar o c&acirc;ncer antes do surgimento dos sintomas. A mamografia &eacute; uma radiografia das mamas feita por um equipamento de raios X chamado mam&oacute;grafo, capaz de identificar altera&ccedil;&otilde;es suspeitas. Mulheres com risco elevado para c&acirc;ncer de mama devem conversar com o seu m&eacute;dico para avalia&ccedil;&atilde;o do risco para decidir a conduta a ser adotada. Quanto mais r&aacute;pido e precoce o diagn&oacute;stico menor &eacute; a chance de comprometimento em outros &oacute;rg&atilde;os.</p>\r\n\r\n<p><strong>TRATAMENTOS</strong></p>\r\n\r\n<p>Importantes avan&ccedil;os na abordagem do c&acirc;ncer de mama aconteceram nos &uacute;ltimos anos, principalmente no que diz respeito a cirurgias menos mutilantes, assim como a busca da individualiza&ccedil;&atilde;o do tratamento. O tratamento varia de acordo com o est&aacute;gio da doen&ccedil;a, suas caracter&iacute;sticas biol&oacute;gicas e das condi&ccedil;&otilde;es da paciente. O progn&oacute;stico depende da extens&atilde;o da doen&ccedil;a (est&aacute;gio). Quando a doen&ccedil;a &eacute; diagnosticada no in&iacute;cio o tratamento tem maior potencial curativo, quando h&aacute; evid&ecirc;ncias de met&aacute;stases o tratamento tem por objetivos principais prolongar a sobrevida e melhorar a qualidade de vida. As modalidades de tratamento do c&acirc;ncer de mama podem ser divididas em:</p>\r\n\r\n<p>- Tratamento local: cirurgia e radioterapia</p>\r\n\r\n<p>- Tratamento sist&ecirc;mico: quimioterapia, hormonioterapia e terapia biol&oacute;gica</p>\r\n\r\n<pre>\r\n<strong>Fonte: INCA (Instituto Nacional de C&acirc;ncer Jos&eacute; Alencar Gomes da Silva)</strong></pre>'),(3,'OUTUBRO ROSA','<p>O movimento popular conhecido como Outubro Rosa &eacute; comemorado em todo o mundo. Nasceu nos Estados Unidos na d&eacute;cada de 1990 para estimular a participa&ccedil;&atilde;o da popula&ccedil;&atilde;o no controle do c&acirc;ncer de mama.</p>\r\n\r\n<p>O Outubro Rosa &eacute; uma campanha de conscientiza&ccedil;&atilde;o que tem como objetivo principal alertar as mulheres e a sociedade sobre a import&acirc;ncia da preven&ccedil;&atilde;o e do diagn&oacute;stico precoce do c&acirc;ncer de mama. Esta campanha acontece com mais intensidade no m&ecirc;s de outubro e tem como s&iacute;mbolo o la&ccedil;o cor de rosa.</p>\r\n\r\n<p><strong>NOVEMBRO AZUL</strong></p>\r\n\r\n<p>O Novembro Azul&nbsp;&eacute; uma campanha dirigida &agrave; sociedade e, em especial, aos homens, para conscientiza&ccedil;&atilde;o a respeito de doen&ccedil;as masculinas, com &ecirc;nfase na preven&ccedil;&atilde;o e no diagn&oacute;stico precoce do c&acirc;ncer de pr&oacute;stata.</p>'),(4,'COMO SER VOLUNTÁRIO','<p>Para ser um volunt&aacute;rio da Rede Feminina de Combate ao C&acirc;ncer de Corumb&aacute; &eacute; necess&aacute;rio amor ao pr&oacute;ximo e vontade de ajudar, pois a pessoa assume um compromisso com a institui&ccedil;&atilde;o e com os pacientes. Al&eacute;m disso, os interessados precisam preencher alguns requisitos.</p>\r\n\r\n<p>- Ter mais de 18 anos.</p>\r\n\r\n<p>- Comparecer a sede da Rede Feminina, manifestar sua vontade e preencher uma ficha de inscri&ccedil;&atilde;o com os seus dados pessoais.</p>\r\n\r\n<p>- Informar o dia da semana e o per&iacute;odo do dia (manh&atilde; ou tarde) que tem disponibilidade para trabalhar.</p>\r\n\r\n<p>- O volunt&aacute;rio passar&aacute; por um per&iacute;odo de est&aacute;gio de tr&ecirc;s meses para entender o funcionamento, as normas e a filosofia de trabalho.</p>\r\n\r\n<p>- Ap&oacute;s conclus&atilde;o do est&aacute;gio, voc&ecirc; ser&aacute; oficialmente um volunt&aacute;rio da Rede Feminina de Combate ao C&acirc;ncer de Corumb&aacute;.</p>'),(5,'COMO AJUDAR','<p>A Rede Feminina de Combate ao C&acirc;ncer de Corumb&aacute; <strong>(CNPJ: 07.964.837/0001-08)</strong> n&atilde;o recebe permanentemente quaisquer subven&ccedil;&otilde;es p&uacute;blicas e depende totalmente de recursos doados pelas empresas ou por pessoas f&iacute;sicas.</p>\r\n\r\n<p>Sua coopera&ccedil;&atilde;o &eacute; fundamental.</p>\r\n\r\n<p><strong>CONTRIBUI&Ccedil;&Otilde;ES</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Doa&ccedil;&otilde;es</strong></li>\r\n</ul>\r\n\r\n<p>- Doa&ccedil;&otilde;es em dinheiro independente da quantia e periodicidade.</p>\r\n\r\n<p>- Doa&ccedil;&otilde;es de roupas, sapatos, bolsas, acess&oacute;rios e brinquedos, todos em bom estado.</p>\r\n\r\n<p>- Alimentos n&atilde;o perec&iacute;veis (arroz, feij&atilde;o, macarr&atilde;o, a&ccedil;&uacute;car, &oacute;leo, leite, gelatina)</p>\r\n\r\n<p>- Suplementos alimentares (vou te passar depois)</p>\r\n\r\n<p>- Fraldas geri&aacute;tricas</p>\r\n\r\n<ul>\r\n	<li><strong>S&oacute;cio-contribuinte </strong></li>\r\n</ul>\r\n\r\n<p>Contribui mensalmente atrav&eacute;s de boletos. O valor da contribui&ccedil;&atilde;o &eacute; determinado pelo pr&oacute;prio doador.</p>\r\n\r\n<ul>\r\n	<li><strong>Troco solid&aacute;rio</strong></li>\r\n</ul>\r\n\r\n<p>As empresas interessadas em ajudar poder&atilde;o solicitar as caixinhas de troco que comumente s&atilde;o colocadas pr&oacute;ximas aos operadores de caixa, dessa forma os clientes poder&atilde;o contribuir depositando parte de seu troco.</p>\r\n\r\n<p>Fa&ccedil;a parte dessa corrente solid&aacute;ria e solicite j&aacute; sua caixinha.</p>');
/*!40000 ALTER TABLE `categoria_site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cestas`
--

DROP TABLE IF EXISTS `cestas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cestas` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cestas`
--

LOCK TABLES `cestas` WRITE;
/*!40000 ALTER TABLE `cestas` DISABLE KEYS */;
/*!40000 ALTER TABLE `cestas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consulta_fisioterapeuta`
--

DROP TABLE IF EXISTS `consulta_fisioterapeuta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consulta_fisioterapeuta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_paciente_fisio` int(10) unsigned NOT NULL,
  `data_consulta` varchar(100) NOT NULL,
  `motivo_consulta` text NOT NULL,
  `queixa_principal` varchar(255) DEFAULT NULL,
  `historia_doenca` varchar(255) NOT NULL,
  `radioterapia_inicio` varchar(100) DEFAULT NULL,
  `radioterapia_final` varchar(100) DEFAULT NULL,
  `radioterapia_sessoes` varchar(100) DEFAULT NULL,
  `quimioterapia_inicio` varchar(100) DEFAULT NULL,
  `quimioterapia_final` varchar(100) DEFAULT NULL,
  `quimioterapia_sessoes` varchar(100) DEFAULT NULL,
  `hormonioterapia_inicio` varchar(100) DEFAULT NULL,
  `hormonioterapia_final` varchar(100) DEFAULT NULL,
  `hormonioterapia_sessoes` varchar(100) DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `cabeca` varchar(100) DEFAULT NULL,
  `ombros` varchar(100) DEFAULT NULL,
  `dorso` varchar(100) DEFAULT NULL,
  `lombar` varchar(100) DEFAULT NULL,
  `perve` varchar(100) DEFAULT NULL,
  `joelhos` varchar(100) DEFAULT NULL,
  `pes` varchar(100) DEFAULT NULL,
  `conclusao` varchar(255) DEFAULT NULL,
  `tipo_marcha` varchar(255) DEFAULT NULL,
  `dor` int(1) DEFAULT NULL,
  `local_dor` varchar(100) DEFAULT NULL,
  `aderencias` int(1) DEFAULT NULL,
  `local_aderencias` varchar(255) DEFAULT NULL,
  `outros` varchar(255) DEFAULT NULL,
  `sensibilidade` varchar(100) DEFAULT NULL,
  `localizacao` varchar(255) DEFAULT NULL,
  `profunda` varchar(255) DEFAULT NULL,
  `linfedema_quando` varchar(100) DEFAULT NULL,
  `linfedema_caracteristicas` varchar(100) DEFAULT NULL,
  `linfedema_localizacao` varchar(100) DEFAULT NULL,
  `habitos_sentar` varchar(100) DEFAULT NULL,
  `habitos_deitar_levantar` varchar(100) DEFAULT NULL,
  `habitos_dormir` varchar(100) DEFAULT NULL,
  `parecer_fisioterapico` varchar(255) DEFAULT NULL,
  `conduta` varchar(255) DEFAULT NULL,
  `data_orientacao` varchar(100) DEFAULT NULL,
  `orientacao` text NOT NULL,
  `evolucao` text,
  PRIMARY KEY (`id`),
  KEY `consulta_fisioterapeuta_ibfk_1` (`id_paciente_fisio`),
  CONSTRAINT `consulta_fisioterapeuta_ibfk_1` FOREIGN KEY (`id_paciente_fisio`) REFERENCES `paciente` (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta_fisioterapeuta`
--

LOCK TABLES `consulta_fisioterapeuta` WRITE;
/*!40000 ALTER TABLE `consulta_fisioterapeuta` DISABLE KEYS */;
/*!40000 ALTER TABLE `consulta_fisioterapeuta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consulta_nutricionista`
--

DROP TABLE IF EXISTS `consulta_nutricionista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consulta_nutricionista` (
  `id_consulta_nutri` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_paciente_nutri` int(10) unsigned NOT NULL,
  `data_consulta` text NOT NULL,
  `motivo_consulta` varchar(255) NOT NULL,
  `informacoes_evolucao` text NOT NULL,
  `patologia` text,
  `patologia_associada` text,
  `peso_habitual` float DEFAULT NULL,
  `peso_atual` float DEFAULT NULL,
  `peso_desejavel` float DEFAULT NULL,
  `cc` varchar(255) DEFAULT NULL,
  `altura` double DEFAULT NULL,
  `realiza_atividade_fisica` tinyint(1) DEFAULT NULL,
  `tipo_atividade_fisica` text,
  `disfagia` tinyint(1) DEFAULT NULL,
  `pirose` tinyint(1) DEFAULT NULL,
  `odinofagia` tinyint(1) DEFAULT NULL,
  `aspecto_fezes` text,
  `modificacoes_fezes` text,
  `apetite_atual` varchar(255) DEFAULT NULL,
  `desjejum_refeicao` text,
  `desjejum_qtd` text,
  `desjejum_hora` time DEFAULT NULL,
  `colacao_refeicao` text,
  `colacao_qtd` text,
  `colacao_hora` time DEFAULT NULL,
  `almoco_refeicao` text,
  `almoco_qtd` text,
  `almoco_hora` time DEFAULT NULL,
  `lanche_refeicao` text,
  `lanche_qtd` text,
  `lanche_hora` time DEFAULT NULL,
  `jantar_refeicao` text,
  `jantar_qtd` text,
  `jantar_hora` time DEFAULT NULL,
  `ceia_refeicao` text,
  `ceia_qtd` text,
  `ceia_hora` time DEFAULT NULL,
  `id_nutricionista` int(11) NOT NULL,
  PRIMARY KEY (`id_consulta_nutri`),
  KEY `consulta_nutricionista_ibfk_1` (`id_paciente_nutri`),
  CONSTRAINT `consulta_nutricionista_ibfk_1` FOREIGN KEY (`id_paciente_nutri`) REFERENCES `paciente` (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta_nutricionista`
--

LOCK TABLES `consulta_nutricionista` WRITE;
/*!40000 ALTER TABLE `consulta_nutricionista` DISABLE KEYS */;
/*!40000 ALTER TABLE `consulta_nutricionista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `depoimentos_site`
--

DROP TABLE IF EXISTS `depoimentos_site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `depoimentos_site` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `ativo` varchar(50) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `depoimentos_site`
--

LOCK TABLES `depoimentos_site` WRITE;
/*!40000 ALTER TABLE `depoimentos_site` DISABLE KEYS */;
INSERT INTO `depoimentos_site` VALUES (1,'Josiane Maciel','active','22490.png','<p> A Rede Feminina para mim é o meu segundo lar, considero as voluntárias a minha segunda familia. Aqui o contato com cada uma delas é mais que amizade, podemos contar com um ombro amigo, conseguimos através delas remédios que não temos condições de comprar, frutas, cereais e cesta básica que nos ajuda e muito.\nAqui nós pacientes somos muito bem acolhidos, onde me sinto muito bem, minha vida mudou muito depois que passei a freguentar a casa da Rede Feminina, mudou para melhor, hoje sou uma pessoa feliz. </p>'),(2,'Joana Domingues','','12144.png','<p>A Rede Feminina de Combate ao Câncer junto às voluntárias desenvolvem um trabalho de recuperação da saúde e da autoestima dos pacientes. Aqui os pacientes se sentem como se estivessem em sua própria casa, aqui eu recuperei a minha saúde, amo muito tudo isso.</p>'),(3,'Elga','','4921.png','<p> A Rede Feminina significa muito para mim, foi onde encontrei ajuda de todas as voluntárias, sempre todas atenciosas e com uma palavra amiga. Foi na Rede Feminina que encontrei forças para lutar contra a minha enfermidade e hoje estou curada, tenho só que agradecer por essas pessoas maravilhosas que tenho um imenso carinho. </p> <p> Só Deus para recompensar o que cada uma delas fizeram e fazem por mim, Deus abençoe todas!</p>');
/*!40000 ALTER TABLE `depoimentos_site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos_site`
--

DROP TABLE IF EXISTS `eventos_site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventos_site` (
  `id_evento` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome_evento` varchar(200) NOT NULL,
  `data_evento` varchar(15) NOT NULL,
  `informacao_evento` text NOT NULL,
  `hora_evento` varchar(10) NOT NULL,
  `endereco_evento` varchar(50) NOT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos_site`
--

LOCK TABLES `eventos_site` WRITE;
/*!40000 ALTER TABLE `eventos_site` DISABLE KEYS */;
INSERT INTO `eventos_site` VALUES (1,'Manhã de Ações','01/10/2016','Coleta de Preventivo, Aferi&ccedil;&atilde;o de Press&atilde;o, Glicose e Atividades F&iacute;sicas. Inscri&ccedil;&otilde;es Servi&ccedil;o Social da Rede Feminina. Participa&ccedil;&atilde;o Acad&ecirc;micos de enfermagem da UNIDERP.','11:00','Rua. XV de Novembro, 1199'),(2,'Abertura Oficial Outubro Rosa','03/10/2016','Palestra com a Blogueira Patr&iacute;cia Figueiredo &quot;O que a minha careca me ensinou sobre o amor pr&oacute;prio&quot;.\r\n\r\nEntrada: 1 Lt de Leite Cx (vencimento de 6 meses)','19:00','Ygarapé Eventos, Rua Cuiabá'),(3,'Inscrições para Caminhada 03/10 a 05/10','05/10/2016','1 Kg de Alimento + R$ 5,00 (Arroz, Macarr&atilde;o, &Oacute;leo, A&ccedil;ucar e Trigo com venciento para abril de 2017) Obs.: Inscri&ccedil;&otilde;es enquanto tiverem os tickts das camisetas,','08:00','Rua. XV de Novembro, 1199'),(4,'IV Caminhada Contra ao Câncer','08/10/2016','Sa&iacute;da as 08 Hrs','08:00','Rua. XV de Novembro, 1199'),(5,'Baile Rosa','14/10/2016','Participa&ccedil;&atilde;o Marinho Azevedo, Dj Tony.\r\n\r\nConvites Individuais&nbsp;R$ 25,00 (Posto de Venda: PESDPAN)','23:00','Ygarapé Eventos, Rua Cuiabá'),(6,'Halloween Rosa','22/10/2016','Mini A&ccedil;&atilde;o Social.\r\n\r\nHor&aacute;rio: 8:00 as 11:00 horas&nbsp;','08:00','Escola M. Djalma Sampaio Brasil'),(7,'Desfile Chá \"Amor em Retalhos\"','23/10/2016','Convite Indiv&iacute;dual R$ 30,00&nbsp;(Posto de Venda: Rede Feminina).','17:00','Ygarapé Eventos, Rua Cuiabá'),(8,'II Culto Rosa','29/10/2016','Entrada: 01 Suprimento Alimentar (Ensure, Mucilon, Nutrien, Sustagem, Suco ou Leite de Soja e Gelatina).\r\n\r\nInforma&ccedil;&otilde;es: Pra. Nan&aacute; Cordeiro - 99642-1247','16:00','Ygarapé Eventos, Rua Cuiabá'),(9,'I Corrida Nov. Azul e Encerramento do Outubro Rosa','30/10/2016','Missa no Santu&aacute;rio de N. Sra Auxiliadora &agrave;s 19:00 horas','07:00','Rua. XV de Novembro, 1199');
/*!40000 ALTER TABLE `eventos_site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fluxo_caixa`
--

DROP TABLE IF EXISTS `fluxo_caixa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fluxo_caixa` (
  `id_fluxo_caixa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `saldo_entrada` float DEFAULT NULL,
  `saldo_saida` float DEFAULT NULL,
  `data_final_fluxo` varchar(11) DEFAULT NULL,
  `mes` varchar(11) NOT NULL,
  PRIMARY KEY (`id_fluxo_caixa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fluxo_caixa`
--

LOCK TABLES `fluxo_caixa` WRITE;
/*!40000 ALTER TABLE `fluxo_caixa` DISABLE KEYS */;
INSERT INTO `fluxo_caixa` VALUES (1,150,123,'04/10/2016','04/10/2016');
/*!40000 ALTER TABLE `fluxo_caixa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modelo_cesta`
--

DROP TABLE IF EXISTS `modelo_cesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modelo_cesta` (
  `id` int(11) NOT NULL,
  `id_nome` int(11) NOT NULL DEFAULT '0',
  `id_cestas` int(11) NOT NULL DEFAULT '0',
  `peso` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_nome_x_cestas_nome_produto` (`id_nome`),
  KEY `FK_nome_x_cestas_cestas` (`id_cestas`),
  CONSTRAINT `FK_nome_x_cestas_cestas` FOREIGN KEY (`id_cestas`) REFERENCES `cestas` (`id`),
  CONSTRAINT `FK_nome_x_cestas_nome_produto` FOREIGN KEY (`id_nome`) REFERENCES `nome_produto` (`id_nome_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelo_cesta`
--

LOCK TABLES `modelo_cesta` WRITE;
/*!40000 ALTER TABLE `modelo_cesta` DISABLE KEYS */;
/*!40000 ALTER TABLE `modelo_cesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nome_produto`
--

DROP TABLE IF EXISTS `nome_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nome_produto` (
  `id_nome_produto` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  PRIMARY KEY (`id_nome_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nome_produto`
--

LOCK TABLES `nome_produto` WRITE;
/*!40000 ALTER TABLE `nome_produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `nome_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paciente` (
  `id_paciente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome_paciente` varchar(200) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `telefone` varchar(17) NOT NULL,
  `celular` varchar(17) NOT NULL,
  `cpf` varchar(200) NOT NULL,
  `rg` varchar(200) NOT NULL,
  `sexo` char(1) NOT NULL,
  `status` varchar(50) NOT NULL,
  `nascimento` varchar(12) NOT NULL,
  PRIMARY KEY (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (1,'Adalberto','huasduhahus','123','(55) 5555-5555','(55) 55555-5555','555.555.555-55','555555555555','M','Ativo','04/10/1992');
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente_assistente`
--

DROP TABLE IF EXISTS `paciente_assistente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paciente_assistente` (
  `id_paciente_assistente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_paciente` int(10) unsigned NOT NULL,
  `tipo_doenca` varchar(200) NOT NULL,
  `recebe_auxilio_doenca` tinyint(1) NOT NULL,
  `tipo_auxilio` text,
  `necessita_cesta` tinyint(1) NOT NULL,
  `porque_necessita` text,
  `qtd_pessoas_res` tinyint(4) NOT NULL,
  `qtd_crianca` tinyint(4) NOT NULL,
  `qtd_trabalhadores` tinyint(4) NOT NULL,
  `renda_familiar` float NOT NULL,
  `usa_medicamento` tinyint(1) NOT NULL,
  `tipo_medicamento` text,
  `realiza_outro_tratamento` tinyint(1) NOT NULL,
  `tipo_tratamento` text,
  `necessita_outro_auxilio` tinyint(1) NOT NULL,
  `tipo_outro_auxilio` text,
  PRIMARY KEY (`id_paciente_assistente`),
  KEY `paciente_assistente_ibfk_1` (`id_paciente`),
  CONSTRAINT `paciente_assistente_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente_assistente`
--

LOCK TABLES `paciente_assistente` WRITE;
/*!40000 ALTER TABLE `paciente_assistente` DISABLE KEYS */;
/*!40000 ALTER TABLE `paciente_assistente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente_fisioterapeuta`
--

DROP TABLE IF EXISTS `paciente_fisioterapeuta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paciente_fisioterapeuta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_paciente` int(10) unsigned NOT NULL,
  `tipo_cirurgia` varchar(255) NOT NULL,
  `data_cirurgia` varchar(255) NOT NULL,
  `hospital_realizado` varchar(255) NOT NULL,
  `hemitorax_cirurgiado` varchar(255) NOT NULL,
  `trans_operatorio` varchar(255) NOT NULL,
  `pos_operatorio_imediato` varchar(255) NOT NULL,
  `pos_operatorio_tardio` varchar(255) NOT NULL,
  `outras_cirurgias` varchar(255) NOT NULL,
  `realizou_fisioterapia` varchar(255) NOT NULL,
  `casos_cancer` int(1) NOT NULL,
  `parentesco_casos_cancer` varchar(255) NOT NULL,
  `outros_casos` int(1) NOT NULL,
  `local` varchar(255) NOT NULL,
  `parentesco_outros_casos` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `paciente_fisioterapeuta_ibfk_1` (`id_paciente`),
  CONSTRAINT `paciente_fisioterapeuta_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente_fisioterapeuta`
--

LOCK TABLES `paciente_fisioterapeuta` WRITE;
/*!40000 ALTER TABLE `paciente_fisioterapeuta` DISABLE KEYS */;
/*!40000 ALTER TABLE `paciente_fisioterapeuta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente_nutricionista`
--

DROP TABLE IF EXISTS `paciente_nutricionista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paciente_nutricionista` (
  `id_paciente_nutri` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_paciente` int(10) unsigned NOT NULL,
  `tem_alergia_alimentar` tinyint(1) NOT NULL,
  `tipo_alergia_alimentar` text,
  `tem_intolerancia_alimentar` tinyint(1) NOT NULL,
  `tipo_intolerancia_alimentar` text,
  `arquivo` text NOT NULL,
  PRIMARY KEY (`id_paciente_nutri`),
  KEY `paciente_nutricionista_ibfk_1` (`id_paciente`),
  CONSTRAINT `paciente_nutricionista_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente_nutricionista`
--

LOCK TABLES `paciente_nutricionista` WRITE;
/*!40000 ALTER TABLE `paciente_nutricionista` DISABLE KEYS */;
/*!40000 ALTER TABLE `paciente_nutricionista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `id_nome_produto` int(11) NOT NULL,
  `dataVencimento` varchar(12) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `peso` double NOT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `FK_produto_nome_produto` (`id_nome_produto`),
  CONSTRAINT `FK_produto_nome_produto` FOREIGN KEY (`id_nome_produto`) REFERENCES `nome_produto` (`id_nome_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projeto`
--

DROP TABLE IF EXISTS `projeto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projeto` (
  `id_projeto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_voluntaria` int(10) unsigned NOT NULL,
  `titulo_projeto` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id_projeto`),
  KEY `projeto_ibfk_1` (`id_voluntaria`),
  CONSTRAINT `projeto_ibfk_1` FOREIGN KEY (`id_voluntaria`) REFERENCES `voluntaria` (`id_voluntaria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projeto`
--

LOCK TABLES `projeto` WRITE;
/*!40000 ALTER TABLE `projeto` DISABLE KEYS */;
/*!40000 ALTER TABLE `projeto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voluntaria`
--

DROP TABLE IF EXISTS `voluntaria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `voluntaria` (
  `id_voluntaria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome_voluntaria` varchar(200) NOT NULL,
  `data_nascimento` varchar(12) NOT NULL,
  `sexo` char(1) NOT NULL,
  `telefone` varchar(17) NOT NULL,
  `celular` varchar(17) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `rg` varchar(200) NOT NULL,
  `cpf` varchar(200) NOT NULL,
  `profissao` varchar(200) NOT NULL,
  `dia_semana_disponivel` varchar(255) NOT NULL,
  `horario_disponivel` varchar(255) NOT NULL,
  `habilidades` text NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel_acesso` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id_voluntaria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voluntaria`
--

LOCK TABLES `voluntaria` WRITE;
/*!40000 ALTER TABLE `voluntaria` DISABLE KEYS */;
INSERT INTO `voluntaria` VALUES (1,'Administrador','31/03/2016','M','','','15 de Novembro','410','','','Desenvolvedor','Todos os dias','07:00/17:00','Desenvolvimento','redeadmincrb','$2y$10$OhzAYzrVwwv9p8D.PNJiPuMVC8UEPDXI3/zIGA9WFwj87sdd9DIOS','Presidência','Ativo'),(2,'Ana','18/10/1992','F','(67) 3232-3232','(67) 66565-6565','asdadsa','035','2222222','222.222.222-22','gdgdfgdg','dfgdfg','dfgdfg','dgdfgd','anagolin','$2y$10$NFV3pCAf8XXeT/t6UAK0Le3eNP.i7lSukHqPWMVcQlxX01nDxBG9i','Tesoureira','Ativo');
/*!40000 ALTER TABLE `voluntaria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'redefemininaco'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-18 12:04:55
