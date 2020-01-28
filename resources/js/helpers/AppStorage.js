class AppStorage{
    storeToken(token){
        localStorage.setItem('token',token);
    }
    storeUser(user){
        localStorage.setItem('user',user); 
    }
    storeExpiration(expiration){
        localStorage.setItem('expiration',expiration); 
    }
    storeRole(role){
        localStorage.setItem('role',role); 
    }
    store(user, token, expiration,role){
        this.storeExpiration(expiration);
        this.storeToken(token);
        this.storeUser(user);
        if(role){
            this.storeRole(role);
        }
    }
    clear(){
        localStorage.removeItem('token');
        localStorage.removeItem('user');
        localStorage.removeItem('expiration');
        localStorage.removeItem('role');
    }

    getToken(){
        var token = localStorage.getItem('token')
        var expiration = this.getExpiration();

        // if(! token || !expiration)
        //     return null
        
        // if(Date.now() > parseInt(expiraton)){
        //     this.clear();
        //     return null;
        // }else{
        if(token){
            return token;
        }
        return false
       // }
    }
    getUser(){
        return localStorage.getItem('user')
    }
    getExpiration(){
        return localStorage.getItem('expiration')
    }

}


export default AppStorage = new AppStorage();