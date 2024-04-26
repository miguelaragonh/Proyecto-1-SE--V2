-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 25-04-2024 a las 19:20:27
-- Versión del servidor: 10.5.20-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id21847937_srtbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `idEstado`) VALUES
(3, 'Playa', 'Lugares tropicales con vistas hermosas', 1),
(4, 'Montaña', 'Lugares asombrosos', 1),
(5, 'Cuidad', 'Descubre paisajes escondidos entre edificios', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Activ', 'Activo'),
(12, 'Inactivo', 'Inactivo'),
(14, 'Pendiente', 'Estado en espera de revisions'),
(19, 'Cancelado', 'cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` bigint(20) NOT NULL,
  `idUsuario` bigint(20) UNSIGNED NOT NULL,
  `idLugar` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `idUsuario`, `idLugar`, `idCategoria`, `fecha`) VALUES
(37, 29, 13, 4, '2024-02-01 14:51:20'),
(38, 29, 2, 3, '2024-02-01 14:51:50'),
(39, 29, 4, 5, '2024-02-01 14:53:05'),
(40, 29, 4, 5, '2024-02-01 14:53:22'),
(41, 4, 10, 3, '2024-02-03 06:35:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE `lugares` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `ubicacion` text NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `idEstado` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `gmap` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lugares`
--

INSERT INTO `lugares` (`id`, `nombre`, `descripcion`, `ubicacion`, `imagen`, `idEstado`, `idCategoria`, `gmap`) VALUES
(1, 'Prusia', 'Una de las atracciones del bosque es el famoso árbol embrujado. Los personeros del bosque nos comentaron que el nombre se debe a que una vez uno de los visitantes dejó una figura de brujita guindando y después las demás personas siguieron la costumbre de colocar otros objetos, aunque hoy en día el árbol no los conserva y se encuentra totalmente limpio. Además, de que el árbol por sus características guarda un aspecto místico.', 'Turrialba', 'images/202402011410.jpg', 1, 4, 'https://maps.app.goo.gl/dTDex2EaWeJhPBXc9'),
(2, 'Playa Bonita', 'Esta playa está muy cerca del centro de limón a 15 minutos en Vehículo, hay un restaurante al frente y tiene sombrillas de playa por las que debes pagar, la arenas es color crema y el Mar tranquilo, vale la pena visitarlo.', 'Limón', 'images/202402011407.jpg', 1, 3, 'https://maps.app.goo.gl/wcFg6i43UQEQhULZ7'),
(4, 'Paseo de las Flores', 'Centro comercial cubierto, tiendas y restaurantes, cine, parque de trampolines, área de juegos y juegos de RV.', 'Heredia', 'images/202402011411.jpg', 1, 5, 'https://maps.app.goo.gl/Ch7SpngoCvuayQ2f9'),
(5, 'Volcan Arenal', 'Este volcán, que se encuentra en actividad, está en un área rica en flora y fauna, en especial en lo referente a las aves que atraen a miles de avistadores.', 'Alajuela', 'images/202402011408.jpg', 1, 4, 'https://maps.app.goo.gl/WJyihpnhPNmv56qZ9'),
(6, 'Playa manzanillo', 'La esencia de cada uno de ellos es la misma: arena color blanca, agua color turquesa, un oleaje suave en verano y poca piedra, que se mezcla con los árboles que abrazan la orilla y la exuberante vegetación.', 'Limón', 'images/202402010923.jpg', 1, 3, 'https://maps.app.goo.gl/63haes8gw9TD3m5U8'),
(9, 'Playa tamarindo', 'La playa Tamarindo, es una de las playas más espectaculares de costa rica, ubicada en el distrito Tamarindo, sus aguas cristalinas, arena suave y arrecifes, la convierten en una zona vacacional dónde se puede realizar actividades como el surf, snorkeling, kayak, pesca deportiva y buceo.', 'Guanacaste', 'images/202402010927.jpg', 1, 3, 'https://maps.app.goo.gl/pfoYva93n6itWRdh6'),
(10, 'Playa Piuta', 'Esta es una playa de aguas tranquilas, muy cercana y donde personas limonenses adultas mayores y con discapacidad realizan terapias, ocio y recreación.', 'Limón', 'images/202402010929.jpg', 1, 3, 'https://maps.app.goo.gl/ZnW6uahWcakSPMbV7'),
(11, 'Playa Jaco', 'Jacó tiene un oleaje fuerte, arena gris y poca piedra. También es un sitio que destaca por su vida nocturna. Actividades y servicios: Es una playa muy concurrida a la que no le falta ningún servicio. Cerca de la playa, encontrará parqueo, duchas, baños, alquiler de camas y sillas y una torre de seguridad.', 'Puntarenas', 'images/202402010931.jpg', 1, 3, 'https://maps.app.goo.gl/C7QotiAg2GTk676m8'),
(12, 'Playa Puerto Viejo', 'Puerto viejo de Talamanca es una adorable y pequeña localidad de cultura afro-caribeña situada en el mar del Caribe, en la costa del océano Atlántico, en un contexto natural de belleza incomparable. Dista cerca de 50 km de la ciudad de Limón que es la capital de la provincia.', 'Limón', 'images/202402010932.jpg', 1, 3, 'https://maps.app.goo.gl/TBBopDvoCKJ59ztu9'),
(13, 'Cerro Chirripo', 'Es el punto más alto de Costa Rica y el segundo de América Central. La cúspide está a 3.820 metros sobre el nivel del mar. Cerro Ventisqueros: Desde aquí se puede observar bellos atardeceres, una belleza escénica del Área Protegida y gran parte de Talamanca. Suele haber fuertes vientos.', 'Limon', 'images/202402010935.jpg', 1, 4, 'https://maps.app.goo.gl/pYR9uYSqzEKKrWXm9'),
(14, 'Cerro de la Muerte', 'El Cerro de la Muerte, también llamado Cerro Buenavista, es un macizo de 3 491 metros de altitud que forma parte de la Cordillera de Talamanca, en el eje montañoso central de Costa Rica, en las provincias de Cartago y San José.', 'Cartago', 'images/202402010939.jpg', 1, 4, 'https://maps.app.goo.gl/MTjdSDNBTyyGfUdg6'),
(15, 'Cerro Kamuk', 'El cerro Kamuk es una montaña en la base de las colinas y de las montañas de Parque internacional La Amistad, en la cordillera de Talamanca, entre las cordilleras norteñas de Panamá y del sudeste de Costa Rica. 3554 m s. n. m. Son las montañas más altas de América Central.', 'Limón', 'images/202402010940.jpg', 1, 4, 'https://maps.app.goo.gl/6a57KyxwrH1Bmi5A7'),
(16, 'Volcán Turrialba', 'El Volcán Turrialba forma un solo sistema en conjunto con el Volcán Irazú. Es un estratovolcán de forma ovalada y su formación se debe a eventos explosivos y efusivos de lavas, presenta tres cráteres con presencia de coladas en sus flancos.', 'Turrialba', 'images/202402010942.jpg', 1, 4, 'https://maps.app.goo.gl/FPz7SRHXgfaEKk4F8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `idEstado`) VALUES
(1, 'Administrador', 'Rol de administrador', 1),
(2, 'Usuario', 'Rol de usuario', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idEstado` int(11) NOT NULL,
  `idRol` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `preferencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `idEstado`, `idRol`, `img`, `preferencia`) VALUES
(4, 'Miguel', 'Aragon', 'luizaragon25@gmail.com', NULL, '$2y$12$waYo0OgRnNUWRZToxqR6NuUVcdLgxi5i.8537bxU.F2eNixOP4.MG', 'E4s4IMseLQFwP3vpMUAvMKxWsZg0AtXyP2it1k7hTTnlwpJqiCcFkWnnTajl', '2024-01-14 03:14:50', '2024-01-14 03:14:50', 1, 1, 'images/202402030637Migue.jpg', 4),
(6, 'Dylan', 'Cas', 'Dylan25@gmail.com', NULL, '$2y$12$5WHCFCrMDl6g.LWIe0sIFOWgcbZKbCMIGlkqCbO/XvCoxNWukdIBK', NULL, '2024-01-18 01:46:25', '2024-01-18 01:46:25', 1, 2, 'storage/202402010352Dylan.png', 4),
(7, 'Michael', 'Jiminez', 'michael25@gmail.com', NULL, '$2y$12$TR3Dw3KGPAeHGQTSwXAUNujcP9ooMIlZQXqywrj1saA7.sefGwCsu', NULL, '2024-01-21 04:47:42', '2024-01-21 04:47:42', 1, 2, 'storage/202401310755Michael.png', NULL),
(15, 'Josue', 'Vigevani', 'luizaragon21@gmail.com', NULL, '$2y$12$yfMxg7VTqHUs823g7Srjm.aYL1Y/RGYRyr.2AWYDJ1pdwOgUG9OdK', NULL, NULL, NULL, 1, 2, 'storage/202401251807Josue.png', NULL),
(20, 'Josue', 'Aragon', '1@k.com', NULL, '$2y$12$AwYNcpkZAGZ14GJqkMYaBeGnr5yX0o5XFMgGvk34RRjqLqJ95i/AK', NULL, NULL, NULL, 1, 2, NULL, NULL),
(23, 'Miguel', 'Salazar', 'luizaragon255@gmail.com', NULL, '$2y$12$BCKjbo3DLKEMawl2hf//fe/njbnx2rDB36657M/UHNH9bnd.cOybO', NULL, NULL, NULL, 1, 2, NULL, NULL),
(25, 'Denny', 'Gutrie', 'denny@gmail.com', NULL, '$2y$12$QhfvgoANZY.aUAzH6wC.GO9J0oJUdnT1lKF.tv1OsuFBTKA3tgEW.', NULL, NULL, NULL, 1, 2, 'images/202402011400Denny.jpg', NULL),
(26, 'Adri', 'Aguilar', 'luizaragon26@gmail.com', NULL, '$2y$12$QOlSZX3EV9AwOheYPbrwj.rkaXXv5Bv5GcGeNb0Urf40NI1Kt67cO', NULL, NULL, NULL, 1, 2, 'images/202403090427Adri.jpg', NULL),
(28, 'Adri', 'Vigevanie', 'luizaragon28@gmail.com', NULL, '$2y$12$wsYYM3x1bCFeEkV/YnoKwezyINVAlEYpR4/M5bY//8dG8Y5iY3YS.', NULL, NULL, NULL, 1, 2, NULL, NULL),
(29, 'rolo', 'rolo', 'rolo@gmail.com', NULL, '$2y$12$hnZi8OvVgVmv3hG.odFmjuU9wt7hwxm1Vv0SojvaVT2pRw4MjQEt.', NULL, NULL, NULL, 1, 2, 'images/202402020304rolo.webp', NULL),
(30, 'PutoRiki', 'Castillo Alfaro', 'dylancastillocr@gmail.com', NULL, '$2y$12$RKtLu3Lp5IbZeax0mE25NefEfpnhqAIbOX6yEeX50Il1Mzd5jN096', NULL, NULL, NULL, 1, 2, 'images/202402020304Dylan.png', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEstado` (`idEstado`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idLugar` (`idLugar`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `lugares`
--
ALTER TABLE `lugares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEstado` (`idEstado`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEstado` (`idEstado`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_idrol_foreign` (`idRol`),
  ADD KEY `users_idestado_foreign` (`idEstado`),
  ADD KEY `preferencia` (`preferencia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `lugares`
--
ALTER TABLE `lugares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `categoria-Estados` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`);

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historiaLugar` FOREIGN KEY (`idLugar`) REFERENCES `lugares` (`id`),
  ADD CONSTRAINT `historialCategoria` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `historialUsuari` FOREIGN KEY (`idUsuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `lugares`
--
ALTER TABLE `lugares`
  ADD CONSTRAINT `lugarCategoria` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `lugarEstado` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_idestado_foreign` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `users_idrol_foreign` FOREIGN KEY (`idRol`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `usuarioCategoria` FOREIGN KEY (`preferencia`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
