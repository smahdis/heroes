import {Alert, Button, Container, Table} from "react-bootstrap";
import {useForm, usePage} from "@inertiajs/inertia-react";
import React, {useEffect, useState} from 'react';
import Form from 'react-bootstrap/Form';

function Heroes () {
    const { heroes } = usePage().props;
    const [value, setValue] = useState([])
    const [showAlert, setShowAlert] = useState(false)

    const { data } = heroes;
    useEffect(() => {
        console.log("heroes", data);
    }, [data]);

    const { setData, post, processing, errors } = useForm()

    const applyDamage = async(id) => {
        // setShowAlert(false);
        // console.log(value[id])
        if(value[id]) {
            let {weapon_id, hero_id} = value[id];
            if (!weapon_id || !hero_id) {
                setShowAlert(true);
            }
            post('/hero/damage/' + hero_id + '/' + weapon_id);

        } else {
            setShowAlert(true);
        }

    }

    const onWeaponSelect = (e, hero_id) => {
        let v = [...value];
        let o = {
            "weapon_id": e.target.value,
                ...v[hero_id]
        }
        v[hero_id] = o;
        setValue(v);
        setShowAlert(false);
    }


    const onHeroSelect = (e, hero_id) => {
        let v = [...value];
        let o = {
            "hero_id": e.target.value,
                ...v[hero_id]
        }
        v[hero_id] = o;
        setValue(v);
        setShowAlert(false);
    }

    function submit(e) {
        e.preventDefault()

    }

    return (
        <>
            <Container className="p-3">
                <h2>Heroes</h2>
                <Alert variant="danger" show={showAlert}>
                    Please select a weapon and a target to attack
                </Alert>
                <Table striped bordered hover>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Hero</th>
                        <th className="text-center">Health</th>
                        <th>Weapons</th>
                        <th>Select Weapon</th>
                        <th>Hero To Attack</th>
                        <th className="text-center">Attack</th>
                    </tr>
                    </thead>
                    <tbody>
                        {data.map((hero, index) => {
                           return (
                               <tr key={index}>
                                   <td>{++index}</td>
                                   <td>{hero.name}</td>
                                   <td className="text-center">{hero.health}</td>
                                   <td>
                                       {hero.weapons.map((weapon, index) => {
                                           return weapon.name + ", "
                                       })}
                                   </td>
                                   <td>
                                       <Form.Select onChange={(e) => onWeaponSelect(e, hero.id)} aria-label="Default select example">
                                           <option>Weapon To Attack</option>
                                           {hero.weapons.map((weapon, i) => {
                                               return (
                                                   <option key={i} value={weapon.id}>{weapon.name}</option>
                                               )
                                           })}
                                       </Form.Select>
                                   </td>
                                   <td>
                                       <Form.Select onChange={(e) => onHeroSelect(e, hero.id)} aria-label="Default select example">
                                           <option>Target Hero To Attack</option>
                                           {data.filter((mhero)=>mhero.id !== hero.id).map((h, i) => {
                                               return (
                                                   <option key={i} value={h.id}>{h.name}</option>
                                               )
                                           })}
                                       </Form.Select>

                                   </td>
                                   <td className="text-center">
                                       <Button variant="primary" onClick={() => applyDamage(hero.id)}>Attack</Button >
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
