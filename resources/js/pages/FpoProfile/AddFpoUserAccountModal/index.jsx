import { v4 as uuidv4 } from "uuid";
import { useContext, useState } from "react";
import Lucide from "../../../base-components/Lucide";
import { AppContext } from "../../../context/RootContext";
import { useSelector } from "react-redux";
import { BASE_API_URL } from "../../../env";
import { FormInput, FormLabel } from "../../../base-components/Form";
import Button from "../../../base-components/Button";
import { useAppDispatch } from "../../../stores/hooks";
import { setAppSuccessAlert } from "../../../stores/appSuccessAlert";
import { Title } from "@tremor/react";

const AddFpoUserAccountModal = ({ showModal, setShowModal, fpo, fetchFpoUsers }) => {
    const dispatch = useAppDispatch();
    const { updateAppContextState } = useContext(AppContext);
    const token = useSelector((state) => state.auth?.token);
    const [fpoAdmin, setFpoAdmin] = useState({
        name: "",
        email: "",
        phone_number: "",
        fpo_id: fpo?.fpo_id,
    });

    const handleCreateFpoUserAccount = () => {
        updateAppContextState("loading", true);
        axios
            .post(
                `${BASE_API_URL}/fpo/${fpoAdmin?.fpo_id}/user/add`,
                { ...fpoAdmin, fpo_id: fpo?.fpo_id },
                {
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                }
            )
            .then((res) => {
                setShowModal(false);
                fetchFpoUsers();
                dispatch(
                    setAppSuccessAlert({
                        id: uuidv4(),
                        message:
                            "FPO User account has been created successfully!",
                    })
                );
            })
            .catch((err) => {
                // TODO: Notify Error
                console.log(err);
            })
            .finally(() => {
                updateAppContextState("loading", false);
            });
    };

    return (
        <div
            className={`z-[1000] fixed bg-primary rounded-md shadow-md transition-all h-full top-32 bottom-0 right-0 w-full lg:w-1/2 duration-700  ${
                showModal ? "  translate-x-0  " : "translate-x-full"
            }`}
        >
            <div className="flex w-full space-x-8 p-4 ">
                <span
                    className="text-white"
                    onClick={() => setShowModal(false)}
                >
                    <Lucide icon="XSquare" />
                </span>
                <Title className="text-white">
                    Create New FPO User Account
                </Title>
            </div>
            <div className="h-full flex flex-col bg-slate-50">
                <form
                    className="py-8 px-8"
                    onSubmit={(e) => {
                        e.preventDefault();
                        handleCreateFpoUserAccount();
                    }}
                >
                    <div className="py-4">
                        <FormLabel htmlFor="name">Name</FormLabel>
                        <FormInput
                            id="name"
                            required
                            type="text"
                            placeholder="Name"
                            value={fpoAdmin.name}
                            onChange={(e) =>
                                setFpoAdmin({
                                    ...fpoAdmin,
                                    name: e.target.value,
                                })
                            }
                        />
                    </div>

                    <div className="py-4">
                        <FormLabel htmlFor="email">Email</FormLabel>
                        <FormInput
                            id="email"
                            required
                            type="email"
                            value={fpoAdmin.email}
                            onChange={(e) =>
                                setFpoAdmin({
                                    ...fpoAdmin,
                                    email: e.target.value,
                                })
                            }
                        />
                    </div>
                    <div className="py-4">
                        <FormLabel htmlFor="regular-form-1">
                            Phone Number
                        </FormLabel>
                        <FormInput
                            id="phone_number"
                            required
                            type="text"
                            value={fpoAdmin.phone_number}
                            onChange={(e) =>
                                setFpoAdmin({
                                    ...fpoAdmin,
                                    phone_number: e.target.value,
                                })
                            }
                        />
                    </div>

                    <div className="flex py-4">
                        <Button
                            variant="primary"
                            className="w-full"
                            onClick={() => {}}
                        >
                            Save
                        </Button>
                    </div>
                </form>
            </div>
        </div>
    );
};

export default AddFpoUserAccountModal;
