import {
    Card,
    List,
    ListItem,
    Icon,
    Text,
    Bold,
    Flex,
    Title,
    Button,
    Grid,
} from "@tremor/react";

import {
    BriefcaseIcon,
    DesktopComputerIcon,
    ShieldExclamationIcon,
    ShoppingBagIcon,
    ArrowNarrowRightIcon,
    LightningBoltIcon,
    HomeIcon,
    TruckIcon,
} from "@heroicons/react/solid";

export default function FarmInfoCard(props) {
    const { title, subTitle } = props;
    return (
        <Card {...props}>
            <Title>{title}</Title>
            <Text>{subTitle}</Text>
            {props.children}
        </Card>
    );
}
