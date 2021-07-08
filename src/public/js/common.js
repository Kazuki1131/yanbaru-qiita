function Check(){
    let checked = confirm("削除してもよろしいでしょうか？");
    if (checked) {
        return true;
    } else {
        return false;
    }
}
