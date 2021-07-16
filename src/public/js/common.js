function Check(){
    let checked = confirm("記事を削除してもよろしいですか？");
    if (checked) {
        return true;
    } else {
        return false;
    }
}
function CheckComment(){
    let checked = confirm("コメントを削除してもよろしいですか？");
    if (checked) {
        return true;
    } else {
        return false;
    }
}
