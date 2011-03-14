/*
 * SandscapeEntryPoint.java
 *
 * This file is part of SandScape, http://sourceforge.net/p/sandscape/.
 *
 * Copyright (C) 2011 jAutoInvoice
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
package org.wtactics.sandscape.client;

import com.google.gwt.core.client.EntryPoint;
import org.wtactics.sandscape.client.layout.HomePage;

/**
 * @see Page
 * @since 1.0
 */
public class SandscapeEntryPoint implements EntryPoint {

    public SandscapeEntryPoint() {
    }

    @Override
    public void onModuleLoad() {
        //TODO: //NOTE: testing code...
        //
        new HomePage().doLayout();
        //new StatsPage().doLayout();
        //new LobbyPage().doLayout();
        //new GamePage().doLayout();
    }
}
//TODO: implement
