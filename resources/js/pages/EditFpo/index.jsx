import React, { useContext } from "react";
import { Title } from "@tremor/react";
import Button from "../../base-components/Button";
import {
    FormLabel,
    FormInput,
    FormHelp,
    FormSelect,
} from "../../base-components/Form";
import { useLocation, useNavigate } from "react-router-dom";
import { AppContext } from "../../context/RootContext";
import axios from "axios";
import { BASE_API_URL } from "../../env";
import { useSelector } from "react-redux";
import { FPO_LIST, FPO_PROFILE } from "../../router/routes";

const EditFpo = () => {
    const {
        state: { fpo },
    } = useLocation();
    const navigate = useNavigate();
    const { updateAppContextState } = useContext(AppContext);
    const token = useSelector((state) => state.auth?.token);
    const user = useSelector((state) => state.auth?.user);
    const [fpoData, setFpoData] = React.useState(fpo);

    const handleUpdateFpo = () => {
        updateAppContextState("loading", true);
        axios
            .post(`${BASE_API_URL}/fpo/${fpoData?.id}/update`, fpoData, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((res) => {
                // TODO: Notify success
                navigate(`${FPO_PROFILE}/${fpoData?.id}`);
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
        <form
            className="py-8 px-8"
            onSubmit={(e) => {
                e.preventDefault();
                handleUpdateFpo();
            }}
        >
            <Title>Update {fpoData?.fpo_name}'s Data</Title>

            <div className="py-4">
                <FormLabel htmlFor="regular-form-1">Name</FormLabel>
                <FormInput
                    id="fpo_name"
                    required
                    type="text"
                    placeholder="FPO Name"
                    value={fpoData.fpo_name}
                    onChange={(e) =>
                        setFpoData({ ...fpoData, fpo_name: e.target.value })
                    }
                />
            </div>

            <div className="grid grid-cols-2 md:grid-cols-3 gap-4 items-center py-4">
                <div className="">
                    <FormLabel htmlFor="Cert_of_Inc">
                        Certificate of Incorporation
                    </FormLabel>
                    <FormInput
                        id="Cert_of_Inc"
                        required
                        type="text"
                        placeholder=""
                        value={fpoData.Cert_of_Inc}
                        onChange={(e) =>
                            setFpoData({
                                ...fpoData,
                                Cert_of_Inc: e.target.value,
                            })
                        }
                    />
                </div>

                <div className="">
                    <FormLabel htmlFor="main_crop">Main Crop</FormLabel>
                    <FormInput
                        id="main_crop"
                        required
                        type="text"
                        placeholder="Main crop"
                        value={fpoData.main_crop}
                        onChange={(e) =>
                            setFpoData({
                                ...fpoData,
                                main_crop: e.target.value,
                            })
                        }
                    />
                </div>

                <div className="">
                    <FormLabel htmlFor="fpo_contact_name">
                        Contact Name
                    </FormLabel>
                    <FormInput
                        id="fpo_contact_name"
                        required
                        type="text"
                        placeholder="Contact Name"
                        value={fpoData.fpo_contact_name}
                        onChange={(e) =>
                            setFpoData({
                                ...fpoData,
                                fpo_contact_name: e.target.value,
                            })
                        }
                    />
                </div>

                <div className="">
                    <FormLabel htmlFor="regular-form-1">
                        Contact Phone Number
                    </FormLabel>
                    <FormInput
                        id="contact_phone_number"
                        required
                        type="text"
                        placeholder="Phone number"
                        value={fpoData.contact_phone_number}
                        onChange={(e) =>
                            setFpoData({
                                ...fpoData,
                                contact_phone_number: e.target.value,
                            })
                        }
                    />
                </div>

                <div className="">
                    <FormLabel htmlFor="regular-form-1">
                        Contact Email
                    </FormLabel>
                    <FormInput
                        id="contact_email"
                        required
                        type="email"
                        value={fpoData.contact_email}
                        onChange={(e) =>
                            setFpoData({
                                ...fpoData,
                                contact_email: e.target.value,
                            })
                        }
                    />
                </div>

                <div className="">
                    <FormLabel htmlFor="regular-form-1">
                        Core Staff Count
                    </FormLabel>
                    <FormInput
                        id="core_staff_count"
                        required
                        type="number"
                        value={fpoData.core_staff_count}
                        onChange={(e) =>
                            setFpoData({
                                ...fpoData,
                                core_staff_count: e.target.value,
                            })
                        }
                    />
                </div>

                <div className="">
                    <FormLabel htmlFor="regular-form-1">
                        Core Staff Positions
                    </FormLabel>
                    <FormInput
                        id="core_staff_positions"
                        required
                        type="text"
                        value={fpoData.core_staff_positions}
                        onChange={(e) =>
                            setFpoData({
                                ...fpoData,
                                core_staff_positions: e.target.value,
                            })
                        }
                    />
                </div>

                <div className="">
                    <FormLabel htmlFor="registration_status">
                        Registration status
                    </FormLabel>

                    <FormSelect
                        id="registration_status"
                        required
                        placeholder="status"
                        value={fpoData.registration_status}
                        onChange={(e) =>
                            setFpoData({
                                ...fpoData,
                                registration_status: e.target.value,
                            })
                        }
                    >
                        <option selected value="">
                            -- Status --
                        </option>

                        <option value="Registered">Registered</option>
                        <option value="Not Registered">Not Registered</option>
                    </FormSelect>
                </div>
            </div>

            <div className="grid grid-cols-2 md:grid-cols-3 gap-4 items-center py-4">
                <div className="address">
                    <FormLabel htmlFor="address">Address</FormLabel>
                    <FormInput
                        id="address"
                        required
                        type="text"
                        placeholder=""
                        value={fpoData.address}
                        onChange={(e) =>
                            setFpoData({
                                ...fpoData,
                                address: e.target.value,
                            })
                        }
                    />
                </div>

                <div className="">
                    <FormLabel htmlFor="district">District</FormLabel>
                    <FormInput
                        id="district"
                        required
                        type="text"
                        placeholder=""
                        value={fpoData.district}
                        onChange={(e) =>
                            setFpoData({
                                ...fpoData,
                                district: e.target.value,
                            })
                        }
                    />
                </div>

                <div className="">
                    <FormLabel htmlFor="county">County</FormLabel>
                    <FormInput
                        id="county"
                        required
                        type="text"
                        placeholder=""
                        value={fpoData.county}
                        onChange={(e) =>
                            setFpoData({
                                ...fpoData,
                                county: e.target.value,
                            })
                        }
                    />
                </div>

                <div className="">
                    <FormLabel htmlFor="sub_county">Sub-County</FormLabel>
                    <FormInput
                        id="sub_county"
                        type="text"
                        required
                        placeholder=""
                        value={fpoData.sub_county}
                        onChange={(e) =>
                            setFpoData({
                                ...fpoData,
                                sub_county: e.target.value,
                            })
                        }
                    />
                </div>

                <div className="">
                    <FormLabel htmlFor="regular-form-1">Parish</FormLabel>
                    <FormInput
                        id="parish"
                        required
                        type="text"
                        placeholder=""
                        value={fpoData.parish}
                        onChange={(e) =>
                            setFpoData({
                                ...fpoData,
                                parish: e.target.value,
                            })
                        }
                    />
                </div>

                <div className="">
                    <FormLabel htmlFor="regular-form-1">Village</FormLabel>
                    <FormInput
                        id="village"
                        type="text"
                        required
                        placeholder=""
                        value={fpoData.village}
                        onChange={(e) =>
                            setFpoData({
                                ...fpoData,
                                village: e.target.value,
                            })
                        }
                    />
                </div>
            </div>

            <div className="grid grid-cols-2 md:grid-cols-3 gap-4 items-center py-4">
                <div className="">
                    <FormLabel htmlFor="fpo_cordinates">Coordinates</FormLabel>
                    <FormInput
                        id="fpo_cordinates"
                        required
                        type="text"
                        placeholder=""
                        value={fpoData.fpo_cordinates}
                        onChange={(e) =>
                            setFpoData({
                                ...fpoData,
                                fpo_cordinates: e.target.value,
                            })
                        }
                    />
                </div>

                <div className="">
                    <FormLabel htmlFor="fpo_membership_number">
                        Membership number
                    </FormLabel>
                    <FormInput
                        id="fpo_membership_number"
                        type="number"
                        required
                        placeholder=""
                        value={fpoData.fpo_membership_number}
                        onChange={(e) =>
                            setFpoData({
                                ...fpoData,
                                fpo_membership_number: e.target.value,
                            })
                        }
                    />
                </div>

                <div className="">
                    <FormLabel htmlFor="fpo_cordinates">
                        Female membership
                    </FormLabel>
                    <FormInput
                        id="fpo_female_membership"
                        required
                        type="number"
                        placeholder=""
                        value={fpoData.fpo_female_membership}
                        onChange={(e) =>
                            setFpoData({
                                ...fpoData,
                                fpo_female_membership: e.target.value,
                            })
                        }
                    />
                </div>

                <div className="">
                    <FormLabel htmlFor="fpo_cordinates">
                        Male membership
                    </FormLabel>
                    <FormInput
                        id="fpo_male_membership"
                        required
                        type="number"
                        placeholder=""
                        value={fpoData?.fpo_male_membership}
                        onChange={(e) =>
                            setFpoData({
                                ...fpoData,
                                fpo_male_membership: e.target.value,
                            })
                        }
                    />
                </div>

                <div className="">
                    <FormLabel htmlFor="fpo_male_youth">Male Youth</FormLabel>
                    <FormInput
                        id="fpo_male_youth"
                        type="number"
                        required
                        placeholder=""
                        value={fpoData.fpo_male_youth}
                        onChange={(e) =>
                            setFpoData({
                                ...fpoData,
                                fpo_male_youth: e.target.value,
                            })
                        }
                    />
                </div>

                <div className="">
                    <FormLabel htmlFor="fpo_female_youth">
                        Female Youth
                    </FormLabel>
                    <FormInput
                        id="fpo_female_youth"
                        type="number"
                        required
                        placeholder=""
                        value={fpoData.fpo_female_youth}
                        onChange={(e) =>
                            setFpoData({
                                ...fpoData,
                                fpo_female_youth: e.target.value,
                            })
                        }
                    />
                </div>
                <div className="">
                    <FormLabel htmlFor="fpo_female_youth">
                        Field Agents
                    </FormLabel>
                    <FormInput
                        id="fpo_field_agents"
                        type="number"
                        required
                        placeholder=""
                        value={fpoData.fpo_field_agents}
                        onChange={(e) =>
                            setFpoData({
                                ...fpoData,
                                fpo_field_agents: e.target.value,
                            })
                        }
                    />
                </div>
            </div>

            <div className="flex py-4">
                <Button
                    variant="primary"
                    className="w-full xl:mr-3"
                    onClick={() => {}}
                >
                    Save
                </Button>
            </div>
        </form>
    );
};

export default EditFpo;
