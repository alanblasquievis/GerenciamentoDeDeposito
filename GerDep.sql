-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Jun-2025 às 04:02
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetofinal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('teste2@gmail.com|127.0.0.1', 'i:2;', 1748230795),
('teste2@gmail.com|127.0.0.1:timer', 'i:1748230795;', 1748230795),
('usuario@example.com|127.0.0.1', 'i:4;', 1748232429),
('usuario@example.com|127.0.0.1:timer', 'i:1748232429;', 1748232429);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cfops`
--

CREATE TABLE `cfops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `tipo` enum('entrada','devolucao') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cfops`
--

INSERT INTO `cfops` (`id`, `descricao`, `codigo`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 'Compra para industrialização', '101', 'entrada', NULL, NULL),
(3, 'Compra de produção do ativo imobilizado', '103', 'entrada', NULL, NULL),
(6, 'Devolução de venda de mercadoria adquirida', '201', 'devolucao', NULL, NULL),
(7, 'Devolução de venda de mercadoria adquirida para industrialização', '202', 'devolucao', NULL, NULL),
(9, 'Devolução de mercadoria em bonificação', '4001', 'devolucao', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `controle_de_estoque`
--

CREATE TABLE `controle_de_estoque` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material` varchar(255) NOT NULL,
  `descricao` varchar(999) NOT NULL,
  `tipo` int(11) NOT NULL,
  `em_estoque` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estabelecimento_id` bigint(20) UNSIGNED NOT NULL,
  `deposito_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `controle_de_estoque`
--

INSERT INTO `controle_de_estoque` (`id`, `material`, `descricao`, `tipo`, `em_estoque`, `created_at`, `updated_at`, `estabelecimento_id`, `deposito_id`) VALUES
(106, '1', 'Parafuso', 1, 50, '2025-05-26 04:38:44', '2025-05-26 05:15:53', 1, 4),
(109, '2', 'Pneu Aro 17', 1, 60, '2025-05-26 05:16:08', '2025-05-26 05:16:55', 1, 10),
(112, '999', 'Caneta Preta', 1, 100, '2025-05-27 03:03:46', '2025-05-27 03:04:53', 1, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `depositos`
--

CREATE TABLE `depositos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rua` varchar(255) NOT NULL,
  `gondola` varchar(255) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `depositos`
--

INSERT INTO `depositos` (`id`, `rua`, `gondola`, `codigo`, `created_at`, `updated_at`) VALUES
(1, '01', '01', 'r01g01', '2025-04-06 16:29:06', '2025-04-06 16:29:06'),
(2, '01', '02', 'r01g02', '2025-04-06 16:29:06', '2025-04-06 16:29:06'),
(3, '01', '03', 'r01g03', '2025-04-06 16:29:06', '2025-04-06 16:29:06'),
(4, '01', '04', 'r01g04', '2025-04-06 16:29:06', '2025-04-06 16:29:06'),
(5, '01', '05', 'r01g05', '2025-04-06 16:29:06', '2025-04-06 16:29:06'),
(6, '01', '06', 'r01g06', '2025-04-06 16:29:06', '2025-04-06 16:29:06'),
(7, '01', '07', 'r01g07', '2025-04-06 16:29:06', '2025-04-06 16:29:06'),
(8, '01', '08', 'r01g08', '2025-04-06 16:29:07', '2025-04-06 16:29:07'),
(9, '01', '09', 'r01g09', '2025-04-06 16:29:07', '2025-04-06 16:29:07'),
(10, '01', '10', 'r01g10', '2025-04-06 16:29:07', '2025-04-06 16:29:07'),
(11, '02', '01', 'r02g01', '2025-04-06 16:29:07', '2025-04-06 16:29:07'),
(12, '02', '02', 'r02g02', '2025-04-06 16:29:07', '2025-04-06 16:29:07'),
(13, '02', '03', 'r02g03', '2025-04-06 16:29:07', '2025-04-06 16:29:07'),
(14, '02', '04', 'r02g04', '2025-04-06 16:29:07', '2025-04-06 16:29:07'),
(15, '02', '05', 'r02g05', '2025-04-06 16:29:07', '2025-04-06 16:29:07'),
(16, '02', '06', 'r02g06', '2025-04-06 16:29:07', '2025-04-06 16:29:07'),
(17, '02', '07', 'r02g07', '2025-04-06 16:29:07', '2025-04-06 16:29:07'),
(18, '02', '08', 'r02g08', '2025-04-06 16:29:07', '2025-04-06 16:29:07'),
(19, '02', '09', 'r02g09', '2025-04-06 16:29:07', '2025-04-06 16:29:07'),
(20, '02', '10', 'r02g10', '2025-04-06 16:29:07', '2025-04-06 16:29:07'),
(21, '00', '00', 'dep-ger', '2025-04-29 05:30:27', '2025-04-29 05:30:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entradas_estoque`
--

CREATE TABLE `entradas_estoque` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `controle_de_estoque_id` bigint(20) UNSIGNED NOT NULL,
  `fornecedor_id` bigint(20) UNSIGNED NOT NULL,
  `deposito_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `data_entrada` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estabelecimentos`
--

CREATE TABLE `estabelecimentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `estabelecimentos`
--

INSERT INTO `estabelecimentos` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Administrativo', NULL, NULL),
(2, 'Manutencao', NULL, NULL),
(3, 'Industria', NULL, NULL),
(4, 'Garagem', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
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
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cnpj` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome`, `cnpj`, `endereco`, `telefone`, `email`, `created_at`, `updated_at`) VALUES
(2, 'Comercial Lima e Souza', '98.765.432/0001-02', 'Avenida Paulista, 111', '(11) 99876-5432', 'contato@limasouza.com', NULL, '2025-03-25 21:43:00'),
(3, 'TecnoSoluções Ltda', '11.223.344/0001-03', 'Rua das Palmeiras, 789', '(11) 99987-6543', 'fornecedor@tecnosolucoes.com', NULL, NULL),
(4, 'Distribuidora Silva & Cia', '22.334.455/0001-04', 'Rua do Sol, 101', '(21) 91234-5678', 'contato@silvace.com', NULL, NULL),
(5, 'Fabrica Verde Comércio', '33.445.556/0001-05', 'Avenida Rio Branco, 202', '(21) 92345-6789', 'vendas@fabricaverde.com', NULL, NULL),
(6, 'Madeireira Rocha', '44.556.667/0001-06', 'Rua das Acácias, 303', '(31) 93456-7890', 'contato@madeirarocha.com', NULL, NULL),
(7, 'Alimentos e Cia', '55.667.778/0001-07', 'Rua dos Jasmins, 404', '(31) 94567-8901', 'sac@alimentoscia.com', NULL, NULL),
(8, 'TecnoPlast Indústria', '66.778.889/0001-08', 'Rua dos Lírios, 505', '(41) 95678-9012', 'suporte@tecnoplast.com', NULL, NULL),
(9, 'Ribeiro e Martins Ltda', '77.889.990/0001-09', 'Avenida Brasil, 606', '(41) 96789-0123', 'contato@ribeiroemartins.com', NULL, NULL),
(10, 'Móveis e Decoração ABC', '88.990.001/0001-10', 'Rua do Comércio, 707', '(51) 97890-1234', 'atendimento@móveisabc.com', NULL, NULL),
(11, 'Ferro e Aço Almeida', '99.001.112/0001-11', 'Rua dos Andrades, 808', '(51) 98901-2345', 'fornecimento@ferroalmeida.com', NULL, NULL),
(12, 'Elétrica Costa', '10.112.223/0001-12', 'Avenida dos Trabalhadores, 909', '(61) 91234-3456', 'comercial@eletricacosta.com', NULL, NULL),
(13, 'Café & Cia', '11.223.344/0001-13', 'Rua do Café, 1010', '(61) 92345-4567', 'contato@cafecia.com', NULL, NULL),
(14, 'Jardins e Paisagismo Ferreira', '12.334.445/0001-14', 'Rua dos Jardins, 1212', '(71) 93456-5678', 'contato@jardinsferreira.com', NULL, NULL),
(15, 'Eletrônicos Souza', '13.445.556/0001-15', 'Avenida Beira Mar, 1313', '(71) 94567-6789', 'suporte@eletronicossouza.com', NULL, NULL),
(17, 'Cooperativa Agraria Agroindustrial', '77890846000179', 'Av Paraná, Sem Número', '36258232', 'alan.blasquievis@agraria.com.br', '2025-03-24 04:59:26', '2025-03-24 04:59:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mercadorias`
--

CREATE TABLE `mercadorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_18_014051_create_estabelecimentos_table', 2),
(5, '2025_03_18_014624_add_estabelecimento_id_to_controle_de_estoque', 3),
(6, '2025_03_18_014847_remove_estabelecimento_from_controle_de_estoque', 4),
(7, '2025_03_18_023525_create_mercadorias_table', 5),
(8, '2025_03_24_003828_add_setor_to_users_table', 6),
(10, '2025_03_24_004454_add_role_to_users_table', 7),
(11, '2025_03_24_010632_create_cfops_table', 7),
(12, '2025_03_24_011218_create_fornecedores_table', 8),
(13, '2025_04_06_131751_create_depositos_table', 9),
(14, '2025_04_06_144427_add_deposito_id_to_controle_de_estoque_table', 10),
(15, '2025_04_29_013438_create_entradas_estoque_table', 1),
(16, '2025_05_10_023659_create_reservas_table', 11),
(17, '2025_05_16_012022_add_unique_index_material_deposito_to_controle_de_estoque_table', 12),
(18, '2025_05_26_035255_add_access_level_to_users_table', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('blskalan10@gmail.com', '$2y$12$WlJGNlm3grsl3wXxM.SONuj8A9gCDmAQWWRXM7uyXUKoWNXfCAski', '2025-05-26 07:07:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material_id` bigint(20) UNSIGNED NOT NULL,
  `quantidade` int(11) NOT NULL,
  `numero_reserva` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`id`, `material_id`, `quantidade`, `numero_reserva`, `created_at`, `updated_at`) VALUES
(45, 106, 0, 'RES0001', '2025-05-26 04:51:25', '2025-05-26 04:51:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6P1AqRf4sUmWCcdUbZSHnCYpj2eQ0Bah5jGjChFB', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMFhBRVdFUmhhdUdIbExnQ0xTN1o0VDZVR0w3S1VzUVN3dmE4SWFqTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZXNlcnZhcy9yZXNlcnZhcy9jb25zdW1pciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1748832849);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `access_level` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `access_level`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'UsuarioTeste', 'emailteste@gmail.com', 'admin', NULL, '$2y$12$3DEdpVrNM6ESqF1DKGYt4eNbygRXWcMuj7TVpbvTO2cJYbvq0atSm', NULL, '2025-03-24 03:41:33', '2025-03-24 03:41:33'),
(5, 'Alan', 'blskalan10@gmail.com', 'user', NULL, '$2y$12$GDfN2dQuBPXpJ5PFSTI9cu15W6TmesLdhHeATqK5YOkR/BFFhG9oS', NULL, '2025-05-26 06:31:53', '2025-05-26 06:31:53'),
(6, 'teste2', 'teste@gmail.com', 'user', NULL, '$2y$12$dOSoiamZMbKaYm..6Ri8Z.9arAv2Qm3YdbM3C8ljtuoi9NCRxyYFm', NULL, '2025-05-26 06:38:41', '2025-05-26 06:38:41'),
(7, 'Usuário Teste', 'usuario@example.com', 'admin', NULL, '$2y$10$Vf09LVjScvWNNnIG0OQ0Y.tzIsUqk0Z1GZCzJqgF1XvU8Di3fPlzK', NULL, '2025-05-26 04:05:52', '2025-05-26 04:05:52');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Índices para tabela `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Índices para tabela `cfops`
--
ALTER TABLE `cfops`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cfops_codigo_unique` (`codigo`);

--
-- Índices para tabela `controle_de_estoque`
--
ALTER TABLE `controle_de_estoque`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `material_deposito_unique` (`material`,`deposito_id`),
  ADD KEY `controle_de_estoque_estabelecimento_id_foreign` (`estabelecimento_id`),
  ADD KEY `controle_de_estoque_deposito_id_foreign` (`deposito_id`);

--
-- Índices para tabela `depositos`
--
ALTER TABLE `depositos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `depositos_codigo_unique` (`codigo`);

--
-- Índices para tabela `entradas_estoque`
--
ALTER TABLE `entradas_estoque`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `estabelecimentos`
--
ALTER TABLE `estabelecimentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fornecedores_cnpj_unique` (`cnpj`);

--
-- Índices para tabela `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Índices para tabela `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mercadorias`
--
ALTER TABLE `mercadorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices para tabela `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reservas_numero_reserva_unique` (`numero_reserva`),
  ADD KEY `reservas_material_id_foreign` (`material_id`);

--
-- Índices para tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cfops`
--
ALTER TABLE `cfops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `controle_de_estoque`
--
ALTER TABLE `controle_de_estoque`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de tabela `depositos`
--
ALTER TABLE `depositos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `entradas_estoque`
--
ALTER TABLE `entradas_estoque`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de tabela `estabelecimentos`
--
ALTER TABLE `estabelecimentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `mercadorias`
--
ALTER TABLE `mercadorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `controle_de_estoque`
--
ALTER TABLE `controle_de_estoque`
  ADD CONSTRAINT `controle_de_estoque_deposito_id_foreign` FOREIGN KEY (`deposito_id`) REFERENCES `depositos` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `controle_de_estoque_estabelecimento_id_foreign` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `controle_de_estoque` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
