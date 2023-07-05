import { useContext } from "react";
import { AppContext } from "../../context/RootContext";

const Loading = () => {
    const { appContextState } = useContext(AppContext);
    const loading = appContextState?.loading;

    if(!loading) return null;

    return (
        <div className=" flex bg-black justify-center items-center w-screen h-screen absolute inset-0 z-50 opacity-60">
            
            <div className="animate-spin inline-block w-6 h-6 border-[3px] border-current border-t-transparent text-secondary rounded-full" role="status" aria-label="loading">
        <span className="sr-only">Loading...</span>
      </div>

        </div>
    );
};

export default Loading;
