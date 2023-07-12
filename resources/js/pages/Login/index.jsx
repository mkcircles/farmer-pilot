import React from "react";
import logoUrl from "../../assets/images/logo.svg";
import Button from "../../base-components/Button";
import { FormInput, FormCheck } from "../../base-components/Form";
import { API_KEY, BASE_API_URL } from "../../env";
import { AppContext } from "../../context/RootContext";
import { useContext } from "react";
import { useAppDispatch } from "../../stores/hooks";
import { setToken, setUser } from "../../stores/authSlice";
import { useNavigate } from "react-router-dom";
import { FARMERS_LIST } from "../../router/routes";


function Main() {
  const dispatch = useAppDispatch();
  const navigate = useNavigate();

  const { updateAppContextState } = useContext(AppContext);
  const [email, setEmail] = React.useState('');
  const [password, setPassword] = React.useState('');


  const handleLogin = () => {
    
    let url = `${BASE_API_URL}/login`;
    updateAppContextState('loading', true);
    axios
        .post(url, {
            email, password
        },)
        .then((res) => {
            console.log("login Response", res.data);
            console.log("Token", res.data.data.token);
            if (['admin', 'fpo_user'].includes(res?.data?.data?.user?.role)) {
                dispatch(setToken(res.data.data.token));
                dispatch(setUser(res.data.data.user));
                navigate('/');
            }else {
              updateAppContextState('errorMessage', 'You are not authorized to access this resource.')
            }
        })
        .catch((err) => {
            console.log(err);
            //alert(err?.message || err.response?.data?.message);
        })
        .finally(() => {
            updateAppContextState('loading', false);
        });
};

  return (
    <>
      <div className="container">
        
        <div className="flex items-center justify-center w-full min-h-screen p-5 md:p-20">
          <div className="w-96 intro-y">
            
            <div className="text-2xl font-medium text-center text-white dark:text-slate-300 mt-14">
              Login to Your Account!
            </div>
            <div className="box px-5 py-8 mt-10 max-w-[450px] relative before:content-[''] before:z-[-1] before:w-[95%] before:h-full before:bg-slate-200 before:border before:border-slate-200 before:-mt-5 before:absolute before:rounded-lg before:mx-auto before:inset-x-0 before:dark:bg-darkmode-600/70 before:dark:border-darkmode-500/60">
              <FormInput
                type="text"
                className="block px-4 py-3"
                placeholder="Email"
                value={email}
                onChange={(e) => setEmail(e.target.value)}
              />
              <FormInput
                type="password"
                className="block px-4 py-3 mt-4"
                placeholder="Password"
                value={password}
                onChange={(e) => setPassword(e.target.value)}
              />
              <div className="flex mt-4 text-xs text-slate-500 sm:text-sm">
                <div className="flex items-center mr-auto">
                  <FormCheck.Input
                    id="remember-me"
                    type="checkbox"
                    className="mr-2 border"
                  />
                  <label
                    className="cursor-pointer select-none"
                    htmlFor="remember-me"
                  >
                    Remember me
                  </label>
                </div>
                <a href="">Forgot Password?</a>
              </div>
              <div className="mt-5 text-center xl:mt-8 xl:text-left">
                <Button variant="primary" className="w-full xl:mr-3" onClick={() => {
                  handleLogin();
                }}>
                  Login
                </Button>
                {/* <Button variant="outline-secondary" className="w-full mt-3">
                  Sign up
                </Button> */}
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
}

export default Main;
