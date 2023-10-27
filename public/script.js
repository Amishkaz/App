const BASE_URL = "http://localhost:8080/api/";
const URL_PREFIX = "/App/public";
async function fetch_data(url, callback) {
    const response = await fetch(url);
    if (response.ok){
        const data = await response.json();
        callback(data);
    }else {
        alert(response.statusText);
    }

}

/**
 * type:    get, get all, add, update, delete
 * table:   related table name
 * data:    data for update and insertion
 * where:   specify the row
 */
function handle_request(type, table, data="", where="", success){
    let url = URL_PREFIX + `/api/request.php?type=${encodeURIComponent(type)}&data=${encodeURIComponent(JSON.stringify(data))}&table=${encodeURIComponent(table)}&where=${encodeURIComponent(where)}`;

    console.log(url);

    function callback(data) {
        if (data['status'] === "FAILED"){
            alert(data['error']);

            if (data['auth'] == null){
                window.location.href = "/App/login.html";
            }

        }else {
            success(data['data']);
        }
    }
    fetch_data(url, callback);

}

function handle_post_request(type, table, data="", where="", success){

    async function send(){

        let a = {
            type: type,
            data: JSON.stringify(data),
            table,
            where
        }

        let response = await fetch(URL_PREFIX +"/api/request.php", {
            method: "POST",
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(a)
        });


        if (response.ok){
            // const d = await response.text();
            // console.log(d);

            const data = await response.json();
            callback(data);
        }else {
            alert(response.statusText);
        }

        function callback(data) {
            if (data['status'] === "FAILED"){
                alert(data['error']);

                if (data['auth'] == null){
                    window.location.href = "/App/login.html";
                }

            }else {
                success(data['data']);
            }
        }


    }

    send();
}




function check_login() {
    let url = window.location.href;
    if (url.includes("login_choose") || url.includes("restaurant_sign_up") || url.includes("sign_in") ||  url.includes("user_sign_up")){

    }else {
        let uid = localStorage.getItem("uid");
        if (uid === null){
            window.location.href = "../login_choose.html";
        }
    }
}

// check_login();

