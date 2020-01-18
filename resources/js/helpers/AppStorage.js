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
    store(user, token, expiration){
        this.storeExpiration(expiration);
        this.storeToken(token);
        this.storeUser(user);
    }
    clear(){
        localStorage.removeItem('token');
        localStorage.removeItem('user');
        localStorage.removeItem('expiration')
    }

    getToken(){
        var token = this.getToken();
        var expiration = this.getExpiration();

        if(! token || !expiration)
            return null
        
        if(Date.now() > parseInt(expiraton)){
            this.clear();
            return null;
        }else{
            return token;
        }
    }
    getUser(){
        return localStorage.getItem('user')
    }
    getExpiration(){
        return localStorage.getItem('expiration')
    }

}


export default AppStorage = new AppStorage();