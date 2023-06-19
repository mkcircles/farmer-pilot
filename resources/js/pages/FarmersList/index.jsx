import {
    Card,
    Title,
    Text,
    Flex,
    Table,
    TableRow,
    TableCell,
    TableHead,
    TableHeaderCell,
    TableBody,
    Badge,
    Button,
} from "@tremor/react";


const farmers = [
    {
        farmerID: "#123456",
        fullname: "Lena Mayer",
        phone: "256776896754",
        fpo: "KYAP",
        district: "Kabale",
        link: "#",
    },
    {
        farmerID: "#234567",
        fullname: "Max Smith",
        phone: "256776896754",
        fpo: "KYAP",
        district: "Kabale",
        link: "#",
    },
    {
        farmerID: "#345678",
        fullname: "Anna Stone",
        phone: "256776896754",
        fpo: "KYAP",
        district: "Kabale",
        link: "#",
    },
    {
        farmerID: "#4567890",
        fullname: "Truls Cumbersome",
        phone: "256776896754",
        fpo: "KYAP",
        district: "Kabale",
        link: "#",
    },
    {
        farmerID: "#5678901",
        fullname: "Peter Pikser",
        phone: "256776896754",
        fpo: "KYAP",
        district: "Kabale",
        link: "#",
    },
    {
        farmerID: "#6789012",
        fullname: "Phlipp Forest",
        phone: "256776896754",
        fpo: "KYAP",
        district: "Kabale",
        link: "#",
    },
    {
        farmerID: "#78901234",
        fullname: "Mara Pacemaker",
        phone: "256776896754",
        fpo: "KYAP",
        district: "Kabale",
        link: "#",
    },
    {
        farmerID: "#89012345",
        fullname: "Sev Major",
        phone: "256776896754",
        fpo: "KYAP",
        district: "Kabale",
        link: "#",
    },
];

export default function FarmersList() {
    return (
        <div className="w-full h-full">
            <Card className="bg-white h-full">
                <Flex justifyContent="start" className="space-x-2">
                    <Title>Farmers</Title>
                    <Badge color="gray">1,500</Badge>
                </Flex>
                <Text className="mt-2">Overview of farmers profiled</Text>

                <Table className="mt-6">
                    <TableHead>
                        <TableRow>
                            <TableHeaderCell>Farmer ID</TableHeaderCell>
                            <TableHeaderCell>Name</TableHeaderCell>
                            <TableHeaderCell>Phone</TableHeaderCell>
                            <TableHeaderCell>FPO</TableHeaderCell>
                            <TableHeaderCell className="text-right">
                                District
                            </TableHeaderCell>
                            <TableHeaderCell>Link</TableHeaderCell>
                        </TableRow>
                    </TableHead>

                    <TableBody>
                        {farmers.map((farmer) => (
                            <TableRow key={farmer.farmerID}>
                                <TableCell>{farmer.farmerID}</TableCell>
                                <TableCell>{farmer.fullname}</TableCell>
                                <TableCell>{farmer.phone}</TableCell>
                                <TableCell>{farmer.fpo}</TableCell>
                                
                                <TableCell className="text-right">
                                    {farmer.district}
                                </TableCell>
                                <TableCell>
                                    <Button
                                        size="xs"
                                        variant="secondary"
                                        color="gray"
                                    >
                                        See details
                                    </Button>
                                </TableCell>
                            </TableRow>
                        ))}
                    </TableBody>
                </Table>
            </Card>
        </div>
    );
}
