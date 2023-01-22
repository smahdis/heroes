import {Container, Table} from "react-bootstrap";
import {usePage} from "@inertiajs/inertia-react";
import React, { useEffect, useState } from 'react';

function Heroes () {
    const { weapons } = usePage().props;
    const { data } = weapons;
    useEffect(() => {
        console.log("weapons", data);
    }, [data]);

    return (
        <>
            <Container className="p-3">
                <h2>Weapons</h2>
                <Table striped bordered hover>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Weapon</th>
                        <th className="text-center">Damage</th>
                        <th>Heroes Using</th>
                    </tr>
                    </thead>
                    <tbody>
                        {data.map((weapon, index) => {
                           return (
                               <tr key={index}>
                                   <td>{++index}</td>
                                   <td>{weapon.name}</td>
                                   <td className="text-center">{weapon.damage}</td>
                                   <td>
                                       {weapon.heroes.length} Heroe(s) : {weapon.heroes.map((hero, index) => {
                                           return hero.name + ", "
                                       })}
                                   </td>
                               </tr>
                           )
                        })}
                    </tbody>
                </Table>
            </Container>
        </>
    );
}

export default Heroes;
