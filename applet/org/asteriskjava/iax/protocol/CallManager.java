// NAME
//      $RCSfile: CallManager.java,v $
// DESCRIPTION
//      [given below in javadoc format]
// DELTA
//      $Revision: 1237 $
// CREATED
//      $Date: 2009-03-09 15:27:05 +0100 (Mon, 09 Mar 2009) $
// COPYRIGHT
//      Mexuar Technologies Ltd
// TO DO
//
package org.asteriskjava.iax.protocol;

public interface CallManager {
  /**
   * Returns if we can deal with this call or not. Pretends to be a
   * small PBX. Calls can be rejected if (for example) there isn't a
   * telephone plugged into this extension.
   */
  public boolean accept(Call ca);
}
