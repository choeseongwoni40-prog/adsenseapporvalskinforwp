<?php
/**
 * 검색 폼 템플릿
 *
 * @package AdSense_Pro
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text">검색어를 입력하세요:</span>
        <input type="search" 
               class="search-field" 
               placeholder="검색..." 
               value="<?php echo get_search_query(); ?>" 
               name="s" 
               required>
    </label>
    <button type="submit" class="search-submit">
        <span class="screen-reader-text">검색</span>
        검색
    </button>
</form>

<style>
.search-form {
    display: flex;
    gap: 10px;
    margin: 20px 0;
}

.search-form label {
    flex: 1;
}

.search-field {
    width: 100%;
    padding: 10px 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
}

.search-submit {
    padding: 10px 20px;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: 500;
    transition: background-color 0.3s ease;
}

.search-submit:hover {
    background-color: #2980b9;
}
</style>
