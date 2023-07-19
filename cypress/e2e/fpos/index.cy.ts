/// <reference types="cypress" />
import { BASE_URL } from "../../../resources/js/env";
import { loginTest } from "../auth/index.cy";

describe('FPOs', () => {

    beforeEach(() => {
        // cy.visit('/login')
      })

      const fpo = {
        fpo_name: "Test FPO " + parseInt((Math.random() * 10).toString()),
        district: "Lira",
        county: "Lira",
        sub_county: "Odokomit",
        parish: "Barapwo",
        village: "Adyel",
        main_crop: "Cassave",
        fpo_contact_name: "Scot D",
        contact_phone_number: "256770897654",
        contact_email: "scot@disk.com",
        core_staff_count: "15",
        core_staff_positions: "Chairman, Vice, Accountant, Director",

        fpo_membership_number: "100",
        fpo_female_membership: "50",
        fpo_male_membership: "25",
        fpo_male_youth: "50",
        fpo_female_youth: "50",
        fpo_field_agents: "10",

        Cert_of_Inc: "Cert 123",
        address: "Lira, Uganda - Barapwo",
    };

      it('Can create new FPO', () => {
        loginTest();
        cy.visit(`${BASE_URL}/fpos-list`);
        cy.get('[role=btn-create-fpo]').click();
        cy.location('pathname').should('include', 'create-fpo');

        Object.keys(fpo).forEach(key => {
            cy.get(`#${key}`).type(fpo[key]);
        });
        cy.get('#registration_status').select('Registered');
        cy.get('[data-btn-role=submit]').click();
        cy.wait(4 * 1000);

        cy.location("pathname").should("include", "fpos-list");
        cy.get("[data-success-alert=success-alert]").first().should("be.visible");
        

      })

})