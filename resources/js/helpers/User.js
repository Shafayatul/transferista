//import Token from "./Token"
import AppStorage from "./AppStorage"
let role;
class User{
     
    login(data){       
        axios.post('/api/login',data)
        .then(res=>this.responseAfterLogin(res))
        .catch(error=>console.log(error.response.data))
    }  
    responseAfterLogin(res){
        const access_token = res.data.access_token
        const username = res.data.user.name
        const expiration = res.data.expiration
        //  role = res.data.user.role
        AppStorage.store(username,access_token,expiration)
        window.location = '/role'
    
    }
    hasToken(){
        const storedToken = AppStorage.getToken();
        if(storedToken){
            return true;
        }
        return false
    }
    loggedIn(){
        return this.hasToken()
    }
    logout(){
        AppStorage.clear()
        window.location = '/'
    }
    name(){
        if(this.loggedIn()){
            return AppStorage.getUser()
        }
    }
    admin(){
        return this.role === 'admin'
    }
    // id(){
    //     if(this.loggedIn()){
    //         const payload = Token.payload(AppStorage.getToken())
    //         return payload.sub
    //     }
    // }

}

export default User = new User();