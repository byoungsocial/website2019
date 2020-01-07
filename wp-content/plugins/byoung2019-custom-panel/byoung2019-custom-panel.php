<?php
/*
Plugin Name: Configs. Site B-Young
Plugin URI: https://byoung.me/
Description: Configuração do painel Wordpress para o template do site B-Young desenvolvido pela RBF Studio.
Author: RBF Studio
Version: 1.0
Author URI: https://www.rbfstudio.tk
*/
if (!defined('ABSPATH')) exit;

function RegisterPosts(){
    register_post_type('case', array(
        'label' => 'Cases',
        'labels' => array(
            'name' => 'Cases',
            'singular_name' => 'Case',
            'add_new_item' => 'Adicionar Novo Case',
            'edit_item' => 'Editar Case',
            'new_item' => 'Novo Case',
            'view_item' => 'Ver Case',
            'view_items' => 'Ver Cases',
            'search_items' => 'Pesquisar Cases',
            'not_found' => 'Nenhum Case encontrado',
            'not_found_in_trash' => 'Nenum Case encontrado na lixeira'
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'taxonomies' => array('case_category', 'post_tag'),
        'exclude_from_search' => true
    ));
}

function RegisterTaxonomies(){
    register_taxonomy("case_category", "case", array(
        'label' => "Categorias",
        'labels' => array(
            'name' => "Categorias",
            'singular_name' => "Categoria"
        ),
        'show_admin_column' => true,
        'hierarchical' => true
    ));
}

function SetupFields(){
    include_once("byoung2019-custom-fields.php");
}

function AddOptionsPage(){
    if(function_exists('acf_add_options_page')){
        $page_settings = array(
            'page_title' => 'Opções do Tema',
            'menu_title' => 'Opções do Tema',
            'menu_slug' => 'theme-settings',
            'update_button' => 'Atualizar Configurações',
            'update_message' => 'Configurações atualizadas'
        );
        acf_add_options_page($page_settings);
    }
}

function AddOptionsSubPages(){
    if(function_exists('acf_add_options_sub_page')){
        acf_add_options_sub_page(array(
            'page_title' => 'Opções Gerais do Tema',
            'menu_title' => 'Geral',
            'menu_slug' => 'theme-settings-general',
            'parent_slug' => 'theme-settings',
            'update_button' => 'Atualizar Configurações',
            'update_message' => 'Configurações atualizadas'
        ));

        acf_add_options_sub_page(array(
            'page_title' => 'Opções do Cabeçalho',
            'menu_title' => 'Cabeçalho',
            'menu_slug' => 'theme-settings-header',
            'parent_slug' => 'theme-settings',
            'update_button' => 'Atualizar Configurações',
            'update_message' => 'Configurações atualizadas'
        ));

        acf_add_options_sub_page(array(
            'page_title' => 'Opções do Rodapé',
            'menu_title' => 'Rodapé',
            'menu_slug' => 'theme-settings-footer',
            'parent_slug' => 'theme-settings',
            'update_button' => 'Atualizar Configurações',
            'update_message' => 'Configurações atualizadas'
        ));
    }
}

add_action("init", "RegisterPosts");
add_action("init", "RegisterTaxonomies");
add_action("init", "SetupFields");
add_action("init", "AddOptionsPage");
add_action("init", "AddOptionsSubPages");