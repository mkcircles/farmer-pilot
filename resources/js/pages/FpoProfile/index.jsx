import {
    ProgressBar,
    Card,
    Flex,
    Text,
    Metric,
    TabList,
    Tab,
    TabGroup,
    TabPanels,
    TabPanel,
    List,
    ListItem,
    BadgeDelta,
    Bold,
    Grid,
} from "@tremor/react";
import { UserGroupIcon, UserIcon } from "@heroicons/react/solid";
import Lucide from "../../base-components/Lucide";
import Button from "../../base-components/Button";
import _ from "lodash";
import { useContext, useEffect, useState } from "react";
import { AppContext } from "../../context/RootContext";
import { useSelector } from "react-redux";
import { useNavigate, useParams } from "react-router-dom";
import { BASE_API_URL } from "../../env";
import FarmersList from "../FarmersList";
import { EDIT_AGENT, EDIT_FPO } from "../../router/routes";
import AgentsList from "../AgentsList";
import { numberFormatter } from "../../utils/numberFormatter";
import FpoAdminList from "../FpoAdminList";

function Main() {
    const navigate = useNavigate();
    const token = useSelector((state) => state.auth.token);
    const { updateAppContextState } = useContext(AppContext);
    const [fpo, setFpoData] = useState(null);
    let { id } = useParams();

    useEffect(() => {
        updateAppContextState("loading", true);
        axios
            .get(`${BASE_API_URL}/fpo/${id}`, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then(({ data: res }) => {
                console.log("FPO Data", res.data);
                if (res?.data) {
                    setFpoData(res?.data);
                }
            })
            .catch((err) => {
                console.log(err);
            })
            .finally(() => {
                updateAppContextState("loading", false);
            });
    }, [id]);

    return (
        <>
            <div className="flex flex-col items-center mt-8 intro-y sm:flex-row">
                <h2 className="flex items-center mr-auto text-lg font-medium">
                    {fpo?.fpo_name}
                </h2>
                <div className="flex w-full mt-4 sm:w-auto sm:mt-0">
                    <Button
                        onClick={() => {
                            navigate(EDIT_FPO, {
                                state: {
                                    fpo,
                                },
                            });
                        }}
                        variant="primary"
                        className="mr-2 shadow-md"
                    >
                        <Lucide icon="Pencil" className="w-4 h-4 mr-2" /> Update
                        Profile
                    </Button>
                    {/* <Button variant="outline-secondary" className="shadow-md">
            <Lucide icon="Download" className="w-4 h-4 mr-2" /> View Profile
          </Button> */}
                </div>
            </div>
            <div className="grid grid-cols-12 gap-5 mt-5">
                {/* BEGIN: Profile Cover */}
                <div className="col-span-12">
                    <div className="px-3 lg:pt-0 md:pt-3 box intro-y">
                        <div className="lg:flex sm:block flex-col items-center justify-center lg:items-start lg:justify-between text-center lg:flex-row lg:text-left py-4 lg:py-6">
                            {/* <div className="lg:ml-5 col-span-4">
                                <div className="flex justify-center mt-2 text-slate-500 lg:justify-start">
                                    <Lucide
                                        icon="MapPin"
                                        className="w-4 h-4 mr-2"
                                    />{" "}
                                    {fpo?.district}, {fpo?.county} -{" "}
                                    {fpo?.sub_county} - {fpo?.parish} -{" "}
                                    {fpo?.village}
                                </div>
                            </div> */}

                            <div className="md:flex flex-col border-dashed px-2 space-y-2">
                                <div className="w-fit sm:w-full  flex items-center mr-8">
                                    <Lucide
                                        icon="MapPin"
                                        className="w-4 h-4 mr-2"
                                    />{" "}
                                    {fpo?.district}, UG
                                </div>
                                <div className="w-fit sm:w-full flex items-center mr-8 opacity-70">
                                    <span className="w-4 h-4 mr-2" />
                                    {fpo?.county} - {fpo?.sub_county}
                                </div>
                                <div className="w-fit sm:w-full flex items-center mr-8 opacity-70">
                                    <span className="w-4 h-4 mr-2" />
                                    {fpo?.parish} - {fpo?.village}
                                </div>

                                {/* <div className="grid mt-2 h-20 grid-cols-2 px-10 mx-auto mb-6 border-dashed gap-y-2 md:gap-y-0 lg:border-l  border-slate-200 lg:mb-0">
                                    <div className="flex items-center justify-center col-span-2 md:col-span-1 lg:justify-start">
                                        
                                        <Lucide
                                            icon="Phone"
                                            className="w-4 h-4 mr-2"
                                        />
                                        {fpo?.contact_phone_number}
                                    </div> 

                                    <div className="flex items-center justify-center col-span-2 md:col-span-1 lg:justify-start">
                                        <Lucide
                                            icon="User"
                                            className="w-4 h-4 mr-2"
                                        />
                                        {fpo?.fpo_contact_name}
                                    </div>
                                </div>

                                <div className="grid mt-2 h-20 grid-cols-2 px-10 mx-auto mb-6 border-dashed gap-y-2 md:gap-y-0 lg:border-l border-slate-200 lg:mb-0">
                                    <div className="flex items-center justify-center col-span-2 md:col-span-1 lg:justify-start">
                                        <Lucide
                                            icon="Phone"
                                            className="w-4 h-4 mr-2"
                                        />
                                        {fpo?.contact_phone_number}
                                    </div>

                                    <div className="flex items-center justify-center col-span-2 md:col-span-1 lg:justify-start">
                                        <Lucide
                                            icon="User"
                                            className="w-4 h-4 mr-2"
                                        />
                                        {fpo?.fpo_contact_name}
                                    </div>
                                </div> */}
                            </div>

                            <div className="md:flex flex-col border-dashed lg:border-l px-4 md:mt-0 mt-4 md:px-10 space-y-2">
                                <span className="w-fit sm:w-full flex items-center mr-8">
                                    <Lucide
                                        icon="User"
                                        className="w-4 h-4 mr-2"
                                    />
                                    {fpo?.fpo_contact_name}
                                </span>
                                <span className="w-fit flex items-center mr-8">
                                    <Lucide
                                        icon="Phone"
                                        className="w-4 h-4 mr-2"
                                    />
                                    {fpo?.contact_phone_number}
                                </span>
                                <span className="w-fit flex items-center mr-8">
                                    <Lucide
                                        icon="Mail"
                                        className="w-4 h-4 mr-2"
                                    />
                                    {fpo?.contact_email}
                                </span>

                                {/* <div className="grid mt-2 h-20 grid-cols-2 px-10 mx-auto mb-6 border-dashed gap-y-2 md:gap-y-0 lg:border-l  border-slate-200 lg:mb-0">
                                    <div className="flex items-center justify-center col-span-2 md:col-span-1 lg:justify-start">
                                        
                                        <Lucide
                                            icon="Phone"
                                            className="w-4 h-4 mr-2"
                                        />
                                        {fpo?.contact_phone_number}
                                    </div> 

                                    <div className="flex items-center justify-center col-span-2 md:col-span-1 lg:justify-start">
                                        <Lucide
                                            icon="User"
                                            className="w-4 h-4 mr-2"
                                        />
                                        {fpo?.fpo_contact_name}
                                    </div>
                                </div>

                                <div className="grid mt-2 h-20 grid-cols-2 px-10 mx-auto mb-6 border-dashed gap-y-2 md:gap-y-0 lg:border-l border-slate-200 lg:mb-0">
                                    <div className="flex items-center justify-center col-span-2 md:col-span-1 lg:justify-start">
                                        <Lucide
                                            icon="Phone"
                                            className="w-4 h-4 mr-2"
                                        />
                                        {fpo?.contact_phone_number}
                                    </div>

                                    <div className="flex items-center justify-center col-span-2 md:col-span-1 lg:justify-start">
                                        <Lucide
                                            icon="User"
                                            className="w-4 h-4 mr-2"
                                        />
                                        {fpo?.fpo_contact_name}
                                    </div>
                                </div> */}
                            </div>

                            <div className="md:flex flex-col border-dashed lg:border-l px-4 md:mt-0 mt-4 md:px-10 space-y-2">
                                <div className="w-fit sm:w-full  flex items-center mr-8">
                                    <span className="opacity-70">
                                        Main crop :&nbsp;
                                    </span>
                                    <span>{fpo?.main_crop}</span>
                                </div>
                                <div className="w-fit sm:w-full  flex items-center mr-8">
                                    <span className="opacity-70">
                                        Core staff : &nbsp;
                                    </span>
                                    <span>{fpo?.core_staff_count}</span>
                                </div>
                                <div className="w-fit sm:w-full  flex items-center mr-8">
                                    <span className="opacity-70">
                                        Registration status : &nbsp;
                                    </span>
                                    <span>{fpo?.registration_status}</span>
                                </div>

                                
                            </div>
                        </div>
                    </div>
                </div>
                {/* END: Profile Cover */}

                {/* BEGIN: Profile Content */}
                {/* 
                        <div className="col-span-12 xl:col-span-8">
                <div className="p-5 box intro-y">
                    <div className="flex items-center pb-5 mb-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <div className="text-base font-medium truncate">Profile</div>
                    <Lucide icon="Edit" className="w-4 h-4 ml-auto text-slate-500" />
                    </div>
                    <div className="leading-relaxed">
                    
                    <Button
                        variant="outline-secondary"
                        className="flex w-full mt-5 border-slate-200/60"
                    >
                        <Lucide icon="ChevronDown" className="w-4 h-4 mr-2" /> View More
                    </Button>
                    </div>
                </div>
                <div className="p-5 mt-5 box intro-y">
                    <div className="flex items-center pb-5 mb-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <div className="text-base font-medium truncate">Experience</div>
                    <Lucide icon="Edit" className="w-4 h-4 ml-auto text-slate-500" />
                    </div>
                    <div>
                    <div className="flex pb-5 mb-5 border-b border-dashed border-slate-200 last:border-b-0 last:pb-0 last:mb-0">
                        <div className="mr-5">
                        <div className="flex items-center justify-center w-16 h-16 text-base font-medium rounded-full bg-slate-200 dark:bg-darkmode-400">
                            SU
                        </div>
                        </div>
                        <div>
                        <div className="text-base font-medium">Left4code Express</div>
                        <div className="mt-1 text-slate-500">
                            Senior Frontend Engineer
                        </div>
                        <div className="mt-1">2005 - 2009 • 4 yrs</div>
                        <ul className="mt-5 -ml-16 list-disc sm:mt-3 sm:ml-3">
                            <li className="mb-1 last:mb-0">
                            Work across the full stack, building highly scalable
                            distributed solutions that enable positive user
                            experiences and measurable business growth.
                            </li>
                            <li className="mb-1 last:mb-0">
                            Develop new features and infrastructure development in
                            support of rapidly emerging business and project
                            requirements.
                            </li>
                            <li className="mb-1 last:mb-0">
                            Assume leadership of new projects from conceptualization
                            to deployment.
                            </li>
                            <li className="mb-1 last:mb-0">
                            Ensure application performance, uptime, and scale,
                            maintaining high standards of code quality and thoughtful
                            application design.
                            </li>
                            <li className="mb-1 last:mb-0">
                            Work with agile development methodologies, adhering to
                            best practices and pursuing continued learning
                            opportunities.
                            </li>
                        </ul>
                        </div>
                    </div>
                    <div className="flex pb-5 mb-5 border-b border-dashed border-slate-200 last:border-b-0 last:pb-0 last:mb-0">
                        <div className="mr-5">
                        <div className="flex items-center justify-center w-16 h-16 text-base font-medium rounded-full bg-slate-200 dark:bg-darkmode-400">
                            UO
                        </div>
                        </div>
                        <div>
                        <div className="text-base font-medium">Freelancer</div>
                        <div className="mt-1 text-slate-500">Fullstack Engineer</div>
                        <div className="mt-1">2010 - 2014 • 4 yrs</div>
                        <ul className="mt-5 -ml-16 list-disc sm:mt-3 sm:ml-3">
                            <li className="mb-1 last:mb-0">
                            Participate in all aspects of agile software development
                            including design, implementation, and deployment
                            </li>
                            <li className="mb-1 last:mb-0">
                            Architect and provide guidance on building end-to-end
                            systems optimized for speed and scale
                            </li>
                            <li className="mb-1 last:mb-0">
                            Work primarily in Ruby, Java/JRuby, React, and JavaScript
                            </li>
                            <li className="mb-1 last:mb-0">
                            Engage with inspiring designers and front end engineers,
                            and collaborate with leading back end engineers as we
                            create reliable APIs
                            </li>
                            <li className="mb-1 last:mb-0">
                            Collaborate across time zones via Slack, GitHub comments,
                            documents, and frequent video conferences
                            </li>
                        </ul>
                        </div>
                    </div>
                    </div>
                    <Button
                    variant="outline-secondary"
                    className="flex w-full mt-5 border-slate-200/60"
                    >
                    <Lucide icon="ChevronDown" className="w-4 h-4 mr-2" /> View More
                    </Button>
                </div>
                <div className="p-5 mt-5 box intro-y">
                    <div className="flex items-center pb-5 mb-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <div className="text-base font-medium truncate">Skills</div>
                    <Lucide icon="Edit" className="w-4 h-4 ml-auto text-slate-500" />
                    </div>
                    <div className="flex flex-wrap">
                    <div className="px-3 py-1 mb-2 mr-2 border rounded-full bg-primary/10 border-primary/10">
                        Ruby
                    </div>
                    <div className="px-3 py-1 mb-2 mr-2 border rounded-full bg-primary/10 border-primary/10">
                        Java/JRuby
                    </div>
                    <div className="px-3 py-1 mb-2 mr-2 border rounded-full bg-primary/10 border-primary/10">
                        React
                    </div>
                    <div className="px-3 py-1 mb-2 mr-2 border rounded-full bg-primary/10 border-primary/10">
                        JavaScript
                    </div>
                    <div className="px-3 py-1 mb-2 mr-2 border rounded-full bg-primary/10 border-primary/10">
                        Typescript
                    </div>
                    <div className="px-3 py-1 mb-2 mr-2 border rounded-full bg-primary/10 border-primary/10">
                        Bootstrap 5
                    </div>
                    <div className="px-3 py-1 mb-2 mr-2 border rounded-full bg-primary/10 border-primary/10">
                        TailwindCSS 3
                    </div>
                    <div className="px-3 py-1 mb-2 mr-2 border rounded-full bg-primary/10 border-primary/10">
                        Vuejs
                    </div>
                    <div className="px-3 py-1 mb-2 mr-2 border rounded-full bg-primary/10 border-primary/10">
                        Ruby
                    </div>
                    <div className="px-3 py-1 mb-2 mr-2 border rounded-full bg-primary/10 border-primary/10">
                        Java/JRuby
                    </div>
                    <div className="px-3 py-1 mb-2 mr-2 border rounded-full bg-primary/10 border-primary/10">
                        React
                    </div>
                    <div className="px-3 py-1 mb-2 mr-2 border rounded-full bg-primary/10 border-primary/10">
                        JavaScript
                    </div>
                    <div className="px-3 py-1 mb-2 mr-2 border rounded-full bg-primary/10 border-primary/10">
                        Typescript
                    </div>
                    <div className="px-3 py-1 mb-2 mr-2 border rounded-full bg-primary/10 border-primary/10">
                        Bootstrap 5
                    </div>
                    <div className="px-3 py-1 mb-2 mr-2 border rounded-full bg-primary/10 border-primary/10">
                        TailwindCSS 3
                    </div>
                    <div className="px-3 py-1 mb-2 mr-2 border rounded-full bg-primary/10 border-primary/10">
                        Vuejs
                    </div>
                    </div>
                </div>
                <div className="p-5 mt-5 box intro-y">
                    <div className="flex items-center pb-5 mb-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <div className="text-base font-medium truncate">Interests</div>
                    <Lucide icon="Edit" className="w-4 h-4 ml-auto text-slate-500" />
                    </div>
                    <div className="grid grid-cols-12 gap-y-7">
                    <div className="flex col-span-12 sm:col-span-6 lg:col-span-4">
                        <div className="flex items-center justify-center w-16 h-16 text-base font-medium rounded-full bg-slate-200 dark:bg-darkmode-400">
                        SV
                        </div>
                        <div className="ml-5">
                        <div className="text-base font-medium">Svelte</div>
                        <div className="mt-1 text-slate-500">4,468,655 followers</div>
                        <Button
                            variant="outline-secondary"
                            rounded
                            className="px-3 py-1 mt-2"
                        >
                            <Lucide icon="Plus" className="w-4 h-4 mr-1" /> Follow
                        </Button>
                        </div>
                    </div>
                    <div className="flex col-span-12 sm:col-span-6 lg:col-span-4">
                        <div className="flex items-center justify-center w-16 h-16 text-base font-medium rounded-full bg-slate-200 dark:bg-darkmode-400">
                        AN
                        </div>
                        <div className="ml-5">
                        <div className="text-base font-medium">Angular</div>
                        <div className="mt-1 text-slate-500">1,468,655 followers</div>
                        <Button
                            variant="outline-secondary"
                            rounded
                            className="px-3 py-1 mt-2"
                        >
                            <Lucide icon="Plus" className="w-4 h-4 mr-1" /> Follow
                        </Button>
                        </div>
                    </div>
                    <div className="flex col-span-12 sm:col-span-6 lg:col-span-4">
                        <div className="flex items-center justify-center w-16 h-16 text-base font-medium rounded-full bg-slate-200 dark:bg-darkmode-400">
                        TW
                        </div>
                        <div className="ml-5">
                        <div className="text-base font-medium">TailwindCSS</div>
                        <div className="mt-1 text-slate-500">
                            45,468,655 followers
                        </div>
                        <Button
                            variant="outline-secondary"
                            rounded
                            className="px-3 py-1 mt-2"
                        >
                            <Lucide icon="Plus" className="w-4 h-4 mr-1" /> Follow
                        </Button>
                        </div>
                    </div>
                    <div className="flex col-span-12 sm:col-span-6 lg:col-span-4">
                        <div className="flex items-center justify-center w-16 h-16 text-base font-medium rounded-full bg-slate-200 dark:bg-darkmode-400">
                        LV
                        </div>
                        <div className="ml-5">
                        <div className="text-base font-medium">Laravel</div>
                        <div className="mt-1 text-slate-500">4,468,655 followers</div>
                        <Button
                            variant="outline-secondary"
                            rounded
                            className="px-3 py-1 mt-2"
                        >
                            <Lucide icon="Plus" className="w-4 h-4 mr-1" /> Follow
                        </Button>
                        </div>
                    </div>
                    <div className="flex col-span-12 sm:col-span-6 lg:col-span-4">
                        <div className="flex items-center justify-center w-16 h-16 text-base font-medium rounded-full bg-slate-200 dark:bg-darkmode-400">
                        RT
                        </div>
                        <div className="ml-5">
                        <div className="text-base font-medium">React</div>
                        <div className="mt-1 text-slate-500">1,468,655 followers</div>
                        <Button
                            variant="outline-secondary"
                            rounded
                            className="px-3 py-1 mt-2"
                        >
                            <Lucide icon="Plus" className="w-4 h-4 mr-1" /> Follow
                        </Button>
                        </div>
                    </div>
                    <div className="flex col-span-12 sm:col-span-6 lg:col-span-4">
                        <div className="flex items-center justify-center w-16 h-16 text-base font-medium rounded-full bg-slate-200 dark:bg-darkmode-400">
                        BS
                        </div>
                        <div className="ml-5">
                        <div className="text-base font-medium">Bootstrap</div>
                        <div className="mt-1 text-slate-500">
                            45,468,655 followers
                        </div>
                        <Button
                            variant="outline-secondary"
                            rounded
                            className="px-3 py-1 mt-2"
                        >
                            <Lucide icon="Plus" className="w-4 h-4 mr-1" /> Follow
                        </Button>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
         */}
                {/* END: Profile Content */}

                {/* BEGIN: Profile Side Menu */}
                {/* <div className="col-span-12 xl:col-span-4">
          <div className="p-5 box intro-y">
            <div className="flex items-center pb-5 mb-5 border-b border-slate-200/60 dark:border-darkmode-400">
              <div className="text-base font-medium truncate">Education</div>
              <Lucide icon="Edit" className="w-4 h-4 ml-auto text-slate-500" />
            </div>
            <div>
              <div className="flex pb-5 mb-5 border-b border-dashed border-slate-200 last:border-b-0 last:pb-0 last:mb-0">
                <div className="flex items-center justify-center w-16 h-16 text-base font-medium rounded-full bg-slate-200 dark:bg-darkmode-400">
                  SU
                </div>
                <div className="ml-5">
                  <div className="text-base font-medium">
                    Stanford University
                  </div>
                  <div className="mt-1 text-slate-500">
                    Computer Science and Engineering
                  </div>
                  <div className="mt-1">2005 - 2009 • 4 yrs</div>
                  <div className="mt-1">California, USA</div>
                </div>
              </div>
              <div className="flex pb-5 mb-5 border-b border-dashed border-slate-200 last:border-b-0 last:pb-0 last:mb-0">
                <div className="flex items-center justify-center w-16 h-16 text-base font-medium rounded-full bg-slate-200 dark:bg-darkmode-400">
                  UO
                </div>
                <div className="ml-5">
                  <div className="text-base font-medium">
                    University of Oxford
                  </div>
                  <div className="mt-1 text-slate-500">
                    Computer Science and Engineering
                  </div>
                  <div className="mt-1">2010 - 2014 • 4 yrs</div>
                  <div className="mt-1">Oxford, England</div>
                </div>
              </div>
            </div>
            <Button
              variant="outline-secondary"
              className="flex w-full mt-5 border-slate-200/60"
            >
              <Lucide icon="ChevronDown" className="w-4 h-4 mr-2" /> View More
            </Button>
          </div>
          <div className="p-5 mt-5 box intro-y">
            <div className="flex items-center pb-5 mb-5 border-b border-slate-200/60 dark:border-darkmode-400">
              <div className="text-base font-medium truncate">
                Followers (102)
              </div>
            </div>
            <div>
              
            </div>
            <Button
              variant="outline-secondary"
              className="flex w-full mt-5 border-slate-200/60"
            >
              <Lucide icon="ChevronDown" className="w-4 h-4 mr-2" /> View More
            </Button>
          </div>
        </div> */}
                {/* END: Profile Side Menu */}
            </div>

            <Grid numItemsSm={2} numItemsLg={3} className="gap-6 my-4">
                <Card>
                    <Text>Members</Text>
                    <Metric>
                        {numberFormatter(parseInt(fpo?.fpo_membership_number))}
                    </Metric>
                    <Flex className="mt-6">
                        <Text>
                            <Bold>Gender</Bold>
                        </Text>
                        <Text>
                            <Bold></Bold>
                        </Text>
                    </Flex>
                    <List className="mt-1">
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-2.5"
                            >
                                <Text className="truncate">Female</Text>
                            </Flex>
                            <Text>
                                {numberFormatter(
                                    parseInt(fpo?.fpo_female_membership)
                                )}
                            </Text>
                        </ListItem>
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-2.5"
                            >
                                <Text className="truncate">Female Youth</Text>
                            </Flex>
                            <Text>
                                {numberFormatter(
                                    parseInt(fpo?.fpo_female_youth)
                                )}
                            </Text>
                        </ListItem>
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-2.5"
                            >
                                <Text className="truncate">Male Youth</Text>
                            </Flex>
                            <Text>
                                {numberFormatter(parseInt(fpo?.fpo_male_youth))}
                            </Text>
                        </ListItem>
                    </List>
                </Card>
                <Card>
                    <Text>Farmers</Text>
                    <Metric>
                        {numberFormatter(parseInt(fpo?.fpo_membership_number))}
                    </Metric>
                    <Flex className="mt-6">
                        <Text>
                            <Bold>Gender</Bold>
                        </Text>
                        <Text>
                            <Bold></Bold>
                        </Text>
                    </Flex>
                    <List className="mt-1">
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-2.5"
                            >
                                <Text className="truncate">Female</Text>
                            </Flex>
                            <Text>
                                {numberFormatter(
                                    parseInt(fpo?.fpo_female_membership)
                                )}
                            </Text>
                        </ListItem>
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-2.5"
                            >
                                <Text className="truncate">Female Youth</Text>
                            </Flex>
                            <Text>
                                {numberFormatter(
                                    parseInt(fpo?.fpo_female_youth)
                                )}
                            </Text>
                        </ListItem>
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-2.5"
                            >
                                <Text className="truncate">Male Youth</Text>
                            </Flex>
                            <Text>
                                {numberFormatter(parseInt(fpo?.fpo_male_youth))}
                            </Text>
                        </ListItem>
                    </List>
                </Card>
                <Card>
                    <Text>Agents</Text>
                    <Metric>
                        {numberFormatter(parseInt(fpo?.fpo_membership_number))}
                    </Metric>
                    <Flex className="mt-6">
                        <Text>
                            <Bold>Gender</Bold>
                        </Text>
                        <Text>
                            <Bold></Bold>
                        </Text>
                    </Flex>
                    <List className="mt-1">
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-2.5"
                            >
                                <Text className="truncate">Female</Text>
                            </Flex>
                            <Text>
                                {numberFormatter(
                                    parseInt(fpo?.fpo_female_membership)
                                )}
                            </Text>
                        </ListItem>
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-2.5"
                            >
                                <Text className="truncate">Female Youth</Text>
                            </Flex>
                            <Text>
                                {numberFormatter(
                                    parseInt(fpo?.fpo_female_youth)
                                )}
                            </Text>
                        </ListItem>
                        <ListItem>
                            <Flex
                                justifyContent="start"
                                className="truncate space-x-2.5"
                            >
                                <Text className="truncate">Male Youth</Text>
                            </Flex>
                            <Text>
                                {numberFormatter(parseInt(fpo?.fpo_male_youth))}
                            </Text>
                        </ListItem>
                    </List>
                </Card>
            </Grid>

            <div className="w-full h-full">
                <Card>
                    {/* <Text>Total Sales</Text>
        <Metric>$ 442,276</Metric> */}
                    <TabGroup>
                        <TabList className="">
                            <Tab icon={UserGroupIcon}>Farmers</Tab>
                            <Tab icon={UserGroupIcon}>Agents</Tab>
                            <Tab icon={UserIcon}>FPO Admins</Tab>
                        </TabList>
                        <TabPanels>
                            <TabPanel>
                                <FarmersList fpo_id={id} />
                            </TabPanel>
                            <TabPanel>
                                <AgentsList fpo_id={id} />
                            </TabPanel>
                            <TabPanel>
                                <FpoAdminList fpo_id={id} />
                            </TabPanel>
                        </TabPanels>
                    </TabGroup>
                </Card>
            </div>
        </>
    );
}

export default Main;
