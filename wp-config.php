<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', '2019.b-young.me');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'raphael');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'Rar141197!');

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '8#}}[`aY&)ZO/`2;M@0kP!mEQ`<qAvUnP{:8]8 2q8<r0lG+O|W3-iZ&{[;@#hjl' );
define( 'SECURE_AUTH_KEY',  'E!F+W)4XmCkMJklh7,`k^k@h,^GZA&^goB757@T:*cWZ)r8vqg-rjwIhQ{0V+w&[' );
define( 'LOGGED_IN_KEY',    'I^[DkQU-VZmV{0b=q;I$E:BU=8fyF4!5FVkz>|/M5w0nlhY^eX1{mr7?F}S=BJ1N' );
define( 'NONCE_KEY',        'b^9[G)k0Xp?NFBDQ[gPsU}L#VDv0d<>wOlo;iLi})jye]DE3*xd~n76ra;B[gpe%' );
define( 'AUTH_SALT',        'I4N%6U:B3{j@MuQ)FPX.dFv&PxTzwxx3K)}[{+`I1FO~@f0qUYxRsn<T9HT p[T6' );
define( 'SECURE_AUTH_SALT', 'C(<9OXLkrAKpt@50|>|Z: x*W069EG5pFgSZrG.P>H`4u(5yB[s_b`anq*utw?sy' );
define( 'LOGGED_IN_SALT',   '@o[}cTwThP]FZ)5UlmXkCCADKBy~ A[@abimj*C0+v@$/R>-%ZDQz64P7I0cM##V' );
define( 'NONCE_SALT',       'KYax*/4r{gJJHN/j8pd60/NQHCb/c3#~tpgu5`=x!~ExA]r>qIv BLYrdGO97{lD' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
