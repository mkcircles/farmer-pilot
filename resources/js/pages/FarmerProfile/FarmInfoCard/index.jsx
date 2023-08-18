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
    const { title, subtitle } = props;
    const cardProps = {...props, title: ''};
    return (
        <Card {...cardProps}>
            <Title>{title}</Title>
            <Text>{subtitle}</Text>
            {props.children}
        </Card>
    );
}
