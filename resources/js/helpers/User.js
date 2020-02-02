//import Token from "./Token"
import AppStorage from "./AppStorage"

class User{
     
    login(data){       
        axios.post('/api/login',data)
        .then(res=>this.responseAfterLogin(res))
        .catch(error=>{ return error })
    }  
    responseAfterLogin(res){
        const access_token = res.data.access_token
        const username = res.data.user.name
      
        const expiration = res.data.expired_at
        if(res.data.roles[0] != undefined){
            console.log(res.data.roles[0])
            const role = res.data.roles 
            AppStorage.store(username,access_token,expiration,role)
            window.location = '/'
        }else{
        //  role = res.data.user.role
            const role= false;
            AppStorage.store(username,access_token,expiration,role)
            window.location = '/role'
        }
    
    }
    hasToken(){
        const storedToken = AppStorage.getToken();
        if(storedToken){
            return true;
        }
        return false;
    }
    loggedIn(){
        return this.hasToken()
    }
    logout(){
        localStorage.removeItem('token');
        localStorage.removeItem('user');
        localStorage.removeItem('expiration');
        localStorage.removeItem('role');
        window.location = '/'
    }
    role(){
        return localStorage.getItem('role');
    }
    name(){
        if(this.loggedIn()){
            return AppStorage.getUser()
        }
    }
    admin(){
        if(this.loggedIn()){
            if(this.role() === 'admin'){
                return true;
            }
        }
    }
    customer(){
        if(this.loggedIn()){
            if(this.role() === 'customer'){
                return true;
            }
        }
    }
    transferista(){
        if(this.loggedIn()){
            if(this.role() === 'transferista'){
                return true;
            }
        }
    }
    company(){
        if(this.loggedIn()){
            if(this.role() === 'company'){
                return true;
            }
        }
    }
    driver(){
        if(this.loggedIn()){
            if(this.role() === 'driver'){
                return true;
            }
        }
    }
    employee(){
        if(this.loggedIn()){
            if(this.role() === 'employee'){
                return true;
            }
        }
    }
    // id(){
    //     if(this.loggedIn()){
    //         const payload = Token.payload(AppStorage.getToken())
    //         return payload.sub
    //     }
    // }

}

export default User = new User();