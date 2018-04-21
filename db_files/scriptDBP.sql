USE [master]
GO
/****** Object:  Database [BDProyectos]    Script Date: 21/4/2018 10:48:07 ******/
CREATE DATABASE [BDProyectos]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'BDProyectos', FILENAME = N'G:\Program Files\Microsoft SQL Server\MSSQL14.SQLEXPRESS01\MSSQL\DATA\BDProyectos.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'BDProyectos_log', FILENAME = N'G:\Program Files\Microsoft SQL Server\MSSQL14.SQLEXPRESS01\MSSQL\DATA\BDProyectos_log.ldf' , SIZE = 1024KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
GO
ALTER DATABASE [BDProyectos] SET COMPATIBILITY_LEVEL = 140
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [BDProyectos].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [BDProyectos] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [BDProyectos] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [BDProyectos] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [BDProyectos] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [BDProyectos] SET ARITHABORT OFF 
GO
ALTER DATABASE [BDProyectos] SET AUTO_CLOSE ON 
GO
ALTER DATABASE [BDProyectos] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [BDProyectos] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [BDProyectos] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [BDProyectos] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [BDProyectos] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [BDProyectos] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [BDProyectos] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [BDProyectos] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [BDProyectos] SET  DISABLE_BROKER 
GO
ALTER DATABASE [BDProyectos] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [BDProyectos] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [BDProyectos] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [BDProyectos] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [BDProyectos] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [BDProyectos] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [BDProyectos] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [BDProyectos] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [BDProyectos] SET  MULTI_USER 
GO
ALTER DATABASE [BDProyectos] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [BDProyectos] SET DB_CHAINING OFF 
GO
ALTER DATABASE [BDProyectos] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [BDProyectos] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [BDProyectos] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [BDProyectos] SET QUERY_STORE = OFF
GO
USE [BDProyectos]
GO
ALTER DATABASE SCOPED CONFIGURATION SET IDENTITY_CACHE = ON;
GO
ALTER DATABASE SCOPED CONFIGURATION SET LEGACY_CARDINALITY_ESTIMATION = OFF;
GO
ALTER DATABASE SCOPED CONFIGURATION FOR SECONDARY SET LEGACY_CARDINALITY_ESTIMATION = PRIMARY;
GO
ALTER DATABASE SCOPED CONFIGURATION SET MAXDOP = 0;
GO
ALTER DATABASE SCOPED CONFIGURATION FOR SECONDARY SET MAXDOP = PRIMARY;
GO
ALTER DATABASE SCOPED CONFIGURATION SET PARAMETER_SNIFFING = ON;
GO
ALTER DATABASE SCOPED CONFIGURATION FOR SECONDARY SET PARAMETER_SNIFFING = PRIMARY;
GO
ALTER DATABASE SCOPED CONFIGURATION SET QUERY_OPTIMIZER_HOTFIXES = OFF;
GO
ALTER DATABASE SCOPED CONFIGURATION FOR SECONDARY SET QUERY_OPTIMIZER_HOTFIXES = PRIMARY;
GO
USE [BDProyectos]
GO
/****** Object:  User [root]    Script Date: 21/4/2018 10:48:07 ******/
CREATE USER [root] FOR LOGIN [root] WITH DEFAULT_SCHEMA=[dbo]
GO
ALTER ROLE [db_owner] ADD MEMBER [root]
GO
ALTER ROLE [db_accessadmin] ADD MEMBER [root]
GO
ALTER ROLE [db_securityadmin] ADD MEMBER [root]
GO
ALTER ROLE [db_ddladmin] ADD MEMBER [root]
GO
ALTER ROLE [db_backupoperator] ADD MEMBER [root]
GO
ALTER ROLE [db_datareader] ADD MEMBER [root]
GO
ALTER ROLE [db_datawriter] ADD MEMBER [root]
GO
ALTER ROLE [db_denydatareader] ADD MEMBER [root]
GO
ALTER ROLE [db_denydatawriter] ADD MEMBER [root]
GO
/****** Object:  Table [dbo].[actividades]    Script Date: 21/4/2018 10:48:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[actividades](
	[id_act] [int] IDENTITY(1,1) NOT NULL,
	[id_proyecto] [int] NOT NULL,
	[id_autor] [int] NOT NULL,
	[nombre] [varchar](100) NULL,
	[costo] [float] NULL,
	[detalle] [varchar](1000) NULL,
	[fecha_ejecucion] [date] NULL,
	[fecha_finalizacion] [date] NULL,
	[imagen] [nchar](200) NULL,
 CONSTRAINT [PK_actividades] PRIMARY KEY CLUSTERED 
(
	[id_act] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[asignar_equipo_proyecto]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[asignar_equipo_proyecto](
	[id_asignacion] [int] IDENTITY(1,1) NOT NULL,
	[id_proyecto] [int] NOT NULL,
	[id_usuario] [int] NOT NULL,
	[fecha_asignacion] [datetime] NOT NULL,
 CONSTRAINT [PK_asignar_equipo_proyecto] PRIMARY KEY CLUSTERED 
(
	[id_asignacion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[departamentos]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[departamentos](
	[id_depto] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](45) NULL,
 CONSTRAINT [PK_departamentos] PRIMARY KEY CLUSTERED 
(
	[id_depto] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[detalle_presupuesto]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[detalle_presupuesto](
	[id_detalle_presupuesto] [int] IDENTITY(1,1) NOT NULL,
	[id_proyecto] [int] NULL,
	[nombre] [varchar](45) NULL,
	[descripcion] [varchar](500) NULL,
	[costo] [money] NULL,
 CONSTRAINT [PK_detalle_presupuesto] PRIMARY KEY CLUSTERED 
(
	[id_detalle_presupuesto] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[documento]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[documento](
	[id_doc] [int] IDENTITY(1,1) NOT NULL,
	[id_proyecto] [int] NULL,
	[nombre] [varchar](100) NULL,
	[tipo] [varchar](45) NULL,
	[fecha_creacion] [date] NULL,
 CONSTRAINT [PK_documento] PRIMARY KEY CLUSTERED 
(
	[id_doc] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[imprevistos]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[imprevistos](
	[id_imprevisto] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](45) NULL,
	[detalle] [varchar](500) NULL,
	[costo] [money] NULL,
	[id_proyecto] [int] NULL,
	[id_documento] [int] NULL,
	[imprevistocol] [varchar](45) NULL,
 CONSTRAINT [PK_imprevistos] PRIMARY KEY CLUSTERED 
(
	[id_imprevisto] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[niveles_usuario]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[niveles_usuario](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nivel] [nchar](100) NULL,
 CONSTRAINT [PK_niveles_usuario] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[notas]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[notas](
	[id_nota] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](45) NOT NULL,
	[id_proyecto] [int] NOT NULL,
	[nota] [varchar](500) NOT NULL,
	[fecha_creacion] [date] NOT NULL,
 CONSTRAINT [PK_notas] PRIMARY KEY CLUSTERED 
(
	[id_nota] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[proyecto]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[proyecto](
	[id_proyecto] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](45) NULL,
	[tipo_proyecto] [int] NULL,
	[encargado] [int] NULL,
	[descripcion] [varchar](200) NULL,
	[id_depto] [int] NULL,
	[presupuesto_inicial] [money] NULL,
	[presupuesto_final] [money] NULL,
	[estado] [char](1) NULL,
	[fecha_inicio_1] [date] NULL,
	[fecha_inicio_2] [date] NULL,
	[fecha_final_1] [date] NULL,
	[fecha_final_2] [date] NULL,
	[extension_de] [int] NULL,
 CONSTRAINT [PK_proyecto] PRIMARY KEY CLUSTERED 
(
	[id_proyecto] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tipo_proyecto]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tipo_proyecto](
	[id_tipo] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](50) NULL,
 CONSTRAINT [PK_tipo_proyecto] PRIMARY KEY CLUSTERED 
(
	[id_tipo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[usuario]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[usuario](
	[id_user] [int] IDENTITY(1,1) NOT NULL,
	[username] [varchar](50) NULL,
	[passcode] [varchar](50) NULL,
	[mail] [varchar](50) NULL,
	[nombres] [varchar](100) NULL,
	[apellidos] [varchar](100) NULL,
	[nivel_usuario] [int] NOT NULL,
	[activo] [tinyint] NOT NULL,
 CONSTRAINT [PK_usuario] PRIMARY KEY CLUSTERED 
(
	[id_user] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER TABLE [dbo].[asignar_equipo_proyecto] ADD  CONSTRAINT [DF_asignar_equipo_proyecto_fecha_asignacion]  DEFAULT (getdate()) FOR [fecha_asignacion]
GO
ALTER TABLE [dbo].[proyecto] ADD  CONSTRAINT [DF_proyecto_estado]  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[proyecto] ADD  CONSTRAINT [DF_proyecto_extension_de]  DEFAULT (NULL) FOR [extension_de]
GO
ALTER TABLE [dbo].[usuario] ADD  CONSTRAINT [DF_usuario_nivel_usuario]  DEFAULT ((1)) FOR [nivel_usuario]
GO
ALTER TABLE [dbo].[usuario] ADD  CONSTRAINT [DF_usuario_activo]  DEFAULT ((1)) FOR [activo]
GO
ALTER TABLE [dbo].[actividades]  WITH CHECK ADD  CONSTRAINT [FK__actividad__id_pr__46E78A0C] FOREIGN KEY([id_proyecto])
REFERENCES [dbo].[proyecto] ([id_proyecto])
GO
ALTER TABLE [dbo].[actividades] CHECK CONSTRAINT [FK__actividad__id_pr__46E78A0C]
GO
ALTER TABLE [dbo].[actividades]  WITH CHECK ADD  CONSTRAINT [FK_actividades_usuario] FOREIGN KEY([id_autor])
REFERENCES [dbo].[usuario] ([id_user])
GO
ALTER TABLE [dbo].[actividades] CHECK CONSTRAINT [FK_actividades_usuario]
GO
ALTER TABLE [dbo].[asignar_equipo_proyecto]  WITH CHECK ADD  CONSTRAINT [FK_asignar_equipo_proyecto_proyecto] FOREIGN KEY([id_proyecto])
REFERENCES [dbo].[proyecto] ([id_proyecto])
GO
ALTER TABLE [dbo].[asignar_equipo_proyecto] CHECK CONSTRAINT [FK_asignar_equipo_proyecto_proyecto]
GO
ALTER TABLE [dbo].[asignar_equipo_proyecto]  WITH CHECK ADD  CONSTRAINT [FK_asignar_equipo_proyecto_usuario] FOREIGN KEY([id_usuario])
REFERENCES [dbo].[usuario] ([id_user])
GO
ALTER TABLE [dbo].[asignar_equipo_proyecto] CHECK CONSTRAINT [FK_asignar_equipo_proyecto_usuario]
GO
ALTER TABLE [dbo].[detalle_presupuesto]  WITH CHECK ADD FOREIGN KEY([id_proyecto])
REFERENCES [dbo].[proyecto] ([id_proyecto])
GO
ALTER TABLE [dbo].[documento]  WITH CHECK ADD FOREIGN KEY([id_proyecto])
REFERENCES [dbo].[proyecto] ([id_proyecto])
GO
ALTER TABLE [dbo].[imprevistos]  WITH CHECK ADD FOREIGN KEY([id_documento])
REFERENCES [dbo].[documento] ([id_doc])
GO
ALTER TABLE [dbo].[imprevistos]  WITH CHECK ADD FOREIGN KEY([id_proyecto])
REFERENCES [dbo].[proyecto] ([id_proyecto])
GO
ALTER TABLE [dbo].[notas]  WITH CHECK ADD FOREIGN KEY([id_proyecto])
REFERENCES [dbo].[proyecto] ([id_proyecto])
GO
ALTER TABLE [dbo].[proyecto]  WITH CHECK ADD FOREIGN KEY([encargado])
REFERENCES [dbo].[usuario] ([id_user])
GO
ALTER TABLE [dbo].[proyecto]  WITH CHECK ADD FOREIGN KEY([id_depto])
REFERENCES [dbo].[departamentos] ([id_depto])
GO
ALTER TABLE [dbo].[proyecto]  WITH CHECK ADD FOREIGN KEY([tipo_proyecto])
REFERENCES [dbo].[tipo_proyecto] ([id_tipo])
GO
ALTER TABLE [dbo].[usuario]  WITH CHECK ADD  CONSTRAINT [FK_usuario_niveles_usuario] FOREIGN KEY([nivel_usuario])
REFERENCES [dbo].[niveles_usuario] ([id])
GO
ALTER TABLE [dbo].[usuario] CHECK CONSTRAINT [FK_usuario_niveles_usuario]
GO
/****** Object:  StoredProcedure [dbo].[agregarImprevisto]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
/** Imprevistos **/

-- Agregar imprevisto
CREATE PROCEDURE [dbo].[agregarImprevisto] (
	@nombre varchar(45),
	@detalle varchar(500),
	@costo money,
	@id_proyecto int,
	@id_documento int,
	@imprevistoscol varchar(45)
)
AS
BEGIN
	insert into imprevistos (
		nombre,
		detalle,
		costo,
		id_proyecto,
		id_documento,
		imprevistocol
	)
	values (
		@nombre,
		@detalle,
		@costo,
		@id_proyecto,
		@id_documento,
		@imprevistoscol
	)
END
GO
/****** Object:  StoredProcedure [dbo].[agregarUsuario]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[agregarUsuario] (@username varchar(50), @passcode varchar(50), @mail varchar(50), @nombres varchar(100), @apellidos varchar(100))
AS
BEGIN
	insert into usuario (username, passcode, mail, nombres, apellidos)
	values (@username, @passcode, @mail, @nombres, @apellidos)
END
GO
/****** Object:  StoredProcedure [dbo].[borrarImprevisto]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[borrarImprevisto] (@id_imprevisto int)
AS
BEGIN
	DELETE FROM imprevistos
	WHERE id_imprevisto = @id_imprevisto
END
GO
/****** Object:  StoredProcedure [dbo].[Consultaractividades]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[Consultaractividades]
	
AS
BEGIN
	SELECT * FROM actividades
END
GO
/****** Object:  StoredProcedure [dbo].[consultaractividadesPorId]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[consultaractividadesPorId] (@id_act int)
AS
BEGIN
	SELECT * FROM actividades WHERE id_act = @id_act
END
GO
/****** Object:  StoredProcedure [dbo].[consultaractividadesPorProyecto]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[consultaractividadesPorProyecto] (@id_proyecto int)
AS
BEGIN
	SELECT * FROM actividades WHERE id_proyecto = @id_proyecto
END
GO
/****** Object:  StoredProcedure [dbo].[consultarDepartamentoPorId]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[consultarDepartamentoPorId] (@id_depto int)
AS
BEGIN
    SELECT * FROM departamentos WHERE id_depto = @id_depto
END
GO
/****** Object:  StoredProcedure [dbo].[consultarDepartamentos]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[consultarDepartamentos]
AS
BEGIN
    SELECT * FROM departamentos
END
GO
/****** Object:  StoredProcedure [dbo].[Consultardetallepresupuesto]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[Consultardetallepresupuesto]
	
AS
BEGIN
	SELECT * FROM detalle_presupuesto
END
GO
/****** Object:  StoredProcedure [dbo].[consultardetallepresupuestoPorId]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[consultardetallepresupuestoPorId] (@id_detalle_presupuesto int)
AS
BEGIN
	SELECT * FROM detalle_presupuesto WHERE id_detalle_presupuesto = @id_detalle_presupuesto
END
GO
/****** Object:  StoredProcedure [dbo].[consultarImprevistos]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[consultarImprevistos]
AS
BEGIN
	SELECT * FROM imprevistos
END
GO
/****** Object:  StoredProcedure [dbo].[consultarImprevistosPorDocumento]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[consultarImprevistosPorDocumento] (@id_documento int)
AS
BEGIN
	SELECT * FROM imprevistos WHERE id_documento = @id_documento
END
GO
/****** Object:  StoredProcedure [dbo].[consultarImprevistosPorId]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[consultarImprevistosPorId] (@id_imprevisto int)
AS
BEGIN
	SELECT * FROM imprevistos WHERE id_imprevisto = @id_imprevisto
END
GO
/****** Object:  StoredProcedure [dbo].[consultarImprevistosPorProyecto]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[consultarImprevistosPorProyecto] (@id_proyecto int)
AS
BEGIN
	SELECT * FROM imprevistos WHERE id_proyecto = @id_proyecto
END
GO
/****** Object:  StoredProcedure [dbo].[consultarNotas]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[consultarNotas]
AS
BEGIN
	SELECT * FROM notas
END
GO
/****** Object:  StoredProcedure [dbo].[consultarNotasPorId]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[consultarNotasPorId] (@id_nota int)
AS
BEGIN
	SELECT * FROM notas WHERE id_nota = @id_nota
END
GO
/****** Object:  StoredProcedure [dbo].[consultarNotasPorProyecto]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[consultarNotasPorProyecto] (@id_proyecto int)
AS
BEGIN
	SELECT * FROM notas WHERE id_proyecto = @id_proyecto
END
GO
/****** Object:  StoredProcedure [dbo].[consultarProyectos]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[consultarProyectos]
as 
begin

select * from proyectos
end
GO
/****** Object:  StoredProcedure [dbo].[consultarProyectosPorId]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[consultarProyectosPorId] (@id int)
as 
begin

select * from proyecto where id_proyecto = @id
end
GO
/****** Object:  StoredProcedure [dbo].[consultarTipoProyecto]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[consultarTipoProyecto](@id int)
as begin
	select * from tipo_proyecto
end
GO
/****** Object:  StoredProcedure [dbo].[consultarUsuario]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[consultarUsuario]
AS
BEGIN
	select * from usuario
END
GO
/****** Object:  StoredProcedure [dbo].[Eliminaractividades]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[Eliminaractividades] (@id_act int)
AS
BEGIN
	DELETE FROM actividades
	WHERE id_act = @id_act
END
GO
/****** Object:  StoredProcedure [dbo].[eliminarDepartamento]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[eliminarDepartamento] (@id_depto int)
AS
BEGIN
    DELETE FROM departamentos
    WHERE id_depto = @id_depto
END
GO
/****** Object:  StoredProcedure [dbo].[Eliminardetallepresupuesto]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
--Eliminar detlle presupuesto
CREATE PROCEDURE [dbo].[Eliminardetallepresupuesto] (@id_detalle_presupuesto int)
AS
BEGIN
	DELETE FROM detalle_presupuesto
	WHERE id_detalle_presupuesto = @id_detalle_presupuesto
END
GO
/****** Object:  StoredProcedure [dbo].[eliminarNota]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[eliminarNota] (@id_nota int)
AS
BEGIN
	DELETE FROM notas
	WHERE id_nota = @id_nota
END
GO
/****** Object:  StoredProcedure [dbo].[eliminarTipoProyecto]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[eliminarTipoProyecto](@id int)
as begin
	delete from tipo_proyecto where id_tipo = @id
end
GO
/****** Object:  StoredProcedure [dbo].[eliminarUsuario]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[eliminarUsuario] (@id int)
AS
BEGIN
	delete from usuario
	where id_user = @id
END
GO
/****** Object:  StoredProcedure [dbo].[insertaractividades]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[insertaractividades] (
	@nombre varchar(45),
	@detalle varchar(1000),
	@fecha_ejecucion date,
	@tiempo_ejecucion varchar(45),
	@fecha_finalizacion date,
	@id_proyecto int
	)
AS
BEGIN
	
	insert into actividades (
		nombre,
		detalle,
		fecha_ejecucion,
		tiempo_ejecucion,
		fecha_finalizacion,
		id_proyecto
	)
	values (
		@nombre,
		@detalle,
		@fecha_ejecucion,
		@tiempo_ejecucion,
		@fecha_finalizacion,
		@id_proyecto
	)
END
GO
/****** Object:  StoredProcedure [dbo].[insertarDepartamento]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[insertarDepartamento] (@nombre varchar(45))
AS
BEGIN
    insert into departamentos (nombre)
    values (@nombre)
END
GO
/****** Object:  StoredProcedure [dbo].[insertardetallepresupuesto]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
--Insertar detalle presupuesto
CREATE PROCEDURE [dbo].[insertardetallepresupuesto] (
	@id_proyecto int,
	@nombre varchar(45),
	@descripcion varchar(500),
	@costo money
	)
AS
BEGIN
	
	insert into detalle_presupuesto (
		id_proyecto,
		nombre,
		descripcion,
		costo
	)
	values (
		@id_proyecto,
		@nombre,
		@descripcion,
		@costo
	)
END
GO
/****** Object:  StoredProcedure [dbo].[insertarNota]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- Insertar nota
CREATE PROCEDURE [dbo].[insertarNota] (
	@nombre varchar(45),
	@id_proyecto int,
	@nota varchar(500),
	@fecha_creacion date
)
AS
BEGIN
	insert into notas (
		nombre,
		id_proyecto,
		nota,
		fecha_creacion
	)
	values (
		@nombre,
		@id_proyecto,
		@nota,
		@fecha_creacion
	)
END
GO
/****** Object:  StoredProcedure [dbo].[insertarProyecto]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[insertarProyecto](@nombre varchar(45),@tipo_proyecto int, @encargado int, @descripcion varchar(200),
@depto int, @fecha_inicio date,@fecha_final date, @presupuesto decimal(12,2)
)
as 
begin

insert into proyecto (nombre,tipo_proyecto, encargado, descripcion, presupuesto_inicial, estado, id_depto,
fecha_inicio_1, fecha_final_1) values(@nombre,@tipo_proyecto,@encargado,@descripcion,@presupuesto,@depto,
1,@fecha_inicio,@fecha_final)

end
GO
/****** Object:  StoredProcedure [dbo].[insertarTipoProyecto]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[insertarTipoProyecto](@tipo_proyecto varchar(45))
as begin
	insert into tipo_proyecto(nombre) values (@tipo_proyecto)
end
GO
/****** Object:  StoredProcedure [dbo].[Modificaractividades]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

-- Modificar actividades
CREATE PROCEDURE [dbo].[Modificaractividades] (
		@id_act int,
		@nombre varchar(45),
		@detalle varchar (1000),
		@fecha_ejecucion date,
		@tiempo_ejecucion varchar(45),
		@fecha_finalizacion date,
		@id_proyecto int
	)
AS
BEGIN
	
	update actividades
	SET	nombre = @nombre,
		detalle = @detalle,
		fecha_ejecucion = @fecha_ejecucion,
		tiempo_ejecucion = @tiempo_ejecucion,
		fecha_finalizacion = @fecha_finalizacion,
		id_proyecto = @id_proyecto
	WHERE id_act = @id_act
END
GO
/****** Object:  StoredProcedure [dbo].[modificarDepartamento]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[modificarDepartamento] (@id_depto int, @nombre varchar(45))
AS
BEGIN
    UPDATE departamentos
    SET nombre = @nombre
    WHERE id_depto = @id_depto
END
GO
/****** Object:  StoredProcedure [dbo].[Modificardetallepresupuesto]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- Modificar detalle presupuesto
CREATE PROCEDURE [dbo].[Modificardetallepresupuesto] (
	@id_detalle_presupuesto int,
	@nombre varchar(45),
	@descripcion varchar(500),
	@costo money
	)
AS
BEGIN
	
	update detalle_presupuesto
	SET	nombre = @nombre,
		descripcion = @descripcion,
		costo = @costo
	
	WHERE id_detalle_presupuesto = @id_detalle_presupuesto
END
GO
/****** Object:  StoredProcedure [dbo].[modificarImprevisto]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[modificarImprevisto] (
	@id_imprevisto int,
	@nombre varchar(45),
	@detalle varchar(500),
	@costo decimal (12,2),
	@id_proyecto int,
	@id_documento int,
	@imprevistoscol varchar(45)
)
AS
BEGIN
	UPDATE imprevistos
	SET nombre = @nombre,
		detalle = @detalle,
		costo = @costo,
		id_proyecto = @id_proyecto,
		id_documento = @id_documento,
		imprevistocol = @imprevistoscol

	WHERE id_imprevisto = @id_imprevisto
END
GO
/****** Object:  StoredProcedure [dbo].[modificarNota]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[modificarNota] (
	@id_nota int,
	@nombre varchar(45),
	@id_proyecto int,
	@nota varchar(500),
	@fecha_creacion date
)
AS
BEGIN
	UPDATE notas
	SET nombre = @nombre,
		id_proyecto = @id_proyecto,
		nota = @nota,
		fecha_creacion = @fecha_creacion
	WHERE id_nota = @id_nota
END
GO
/****** Object:  StoredProcedure [dbo].[modificarTipoProyecto]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[modificarTipoProyecto](@id int, @nombre varchar(50))
as begin
	update tipo_proyecto
	set nombre = @nombre
	where id_tipo = @id
end
GO
/****** Object:  StoredProcedure [dbo].[modificarUsuario]    Script Date: 21/4/2018 10:48:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[modificarUsuario] (@id int, @username varchar(50), @passcode varchar(50), @mail varchar(50), @nombres varchar(100), @apellidos varchar(100))
AS
BEGIN
	update usuario
	set username = @username, passcode = @passcode, mail = @mail, nombres = @nombres, apellidos = @apellidos
	where id_user = @id
END
GO
USE [master]
GO
ALTER DATABASE [BDProyectos] SET  READ_WRITE 
GO
