/// <reference types="cypress" />
import { BASE_URL } from "../../../resources/js/env";
import { loginTest } from "../auth/index.cy";

describe('Agents', () => {

    beforeEach(() => {
        // cy.visit('/login')
      })

      const agent = {
        first_name: "User " + `${parseInt((Math.random() * 10).toString())}`,
        last_name: "Scot D",
        email: `scotd${(Date.now())}@test.com`,
        phone_number: `2567${Math.floor(100000000 + Math.random() * 900000000)}`,
        age: "29",
        residence: "Kampala",
        referee_name: "Scot D",
        referee_phone_number: "256770987654",
        designation: "Agent D",
    };

      it('Can create new Agent', () => {
        loginTest();
        cy.visit(`${BASE_URL}/agents-list`);
        cy.get('[role=btn-create-agent]').click();
        cy.location('pathname').should('include', 'create-agent');
        cy.get('button').first().click();
        cy.get('ul').first().should('be.visible');
        cy.get('[role=option]').first().click();
        cy.get('#gender').select('Male');
        Object.keys(agent).forEach(key => {
            cy.get(`#${key}`).type(agent[key]);
        });
        
        cy.get('[data-btn-role=submit]').first().click();
        cy.wait(4 * 1000);

        cy.location("pathname").should("include", "agents-list");
        cy.get("[data-success-alert=success-alert]").first().should("be.visible");
        

      })

})